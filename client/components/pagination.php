
<?php

// get dynamic page URLs while maintaining other query params

function getPaginatedUrl($page_num) {
  // if page parameter already exists, replace page number
  if(preg_match('/page=\d+/', $_SERVER['REQUEST_URI'])) {
    return preg_replace('/page=\d+/', 'page='.$page_num, $_SERVER['REQUEST_URI']);
  // if other parameters have been passed, don't include question mark
  } elseif (preg_match('/.*[?].*/', $_SERVER['REQUEST_URI'])) {
    return $_SERVER['REQUEST_URI'] . '&page='.$page_num;
  } else {
    // no query params have been passed, include "?"
    return $_SERVER['REQUEST_URI'] . '?page='.$page_num;
  } 
}

function getDisplayedPages() {
  global $num_pages;
  global $current_page;
  $page_array = [$current_page];
  $turn = 1;
  $left_index = 1;
  $right_index = 1;
  $loops = 0;
  // get maximum num of pages to be displayed
  if($num_pages < 5) {
    $total_pages = $num_pages;
  } else {
    $total_pages = 5;
  }

  // populate array with sequence of pages
  while(count($page_array) < $total_pages) {
    $loops++;
    if($turn === 1 && $current_page - $left_index > 0) {
      array_unshift($page_array, $current_page - $left_index);
      $left_index++;
      $turn = 0;
    } elseif($turn === 0 && $current_page + $right_index <= $num_pages) {
      // push right page
      array_push($page_array, $current_page + $right_index);
      $right_index++;
      $turn = 1;
      // last two conditions change turn if either side is at their limit
    } elseif($turn === 1) {
      $turn = 0;
    } elseif($turn === 0) {
      $turn = 1;
    }

    if($loops >= 10) {
      echo 'ERROR: while loop limit reached (10)';
      break;
    }

  }

  if($page_array[0] > 1) {
    echo '<span>...</span>';
  }

  // echo page numbers html
  foreach($page_array as $page) {
    if($page === $current_page) {
      echo '<a class="selected" aria-label="page '.$page.'">'.$page.'</a>';
    } else {
      echo '<a href="'.getPaginatedUrl($page).'" aria-label="page '.$page.'">'.$page.'</a>';
    }
  }

  if($page_array[count($page_array)-1] < $num_pages) {
    echo '<span role="presentation">...</span>';
  }
  
}


// Show pagination if more than 1 page of results
if($num_pages > 1) {
  echo '
  <div class="content-block">
    <div class="pagination-container">
      <div class="pagination-wrapper">

        <div class="page-buttons">';
          // show prev button if not at beginning
          if($current_page != 1) {
            echo '
              <a
                href="' . getPaginatedUrl($current_page - 1) . '"
                class="button prev"
              ><i class="bi-caret-left-fill" role="presentation"></i>prev</a>
            ';
          }
          // show next button if not at end
          if($current_page < $num_pages) {
            echo '
              <a
                href="' . getPaginatedUrl($current_page + 1) . '"
                class="button next"
              >next<i class="bi-caret-right-fill" role="presentation"></i></a>
            ';
          }

        echo '
        </div>

        <div class="page-numbers">';
        getDisplayedPages();
        echo '
        </div>

      </div>
    </div>
  </div>
  ';
}

  





?>