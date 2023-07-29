
<?php



  // check if products array is greater than items/page

    // if no, return nothing.

  // if yes, find number of pages needed - ceil()

    // if total pages less than or equal to 5, echo all pages


// <div class="content-block">
//   <div class="pagination-container">
//     <div class="pagination-wrapper">

//       <div class="page-buttons">
//         <button class="prev"><i class="bi-caret-left-fill"></i>prev</button>
//         <button class="next">next<i class="bi-caret-right-fill"></i></button>
//       </div>

//       <div class="page-numbers">
//         <a href="#" class="selected">1</a>
//         <a href="#">2</a>
//         <a href="#">3</a>
//         <span>...</span>
//         <a href="#">4</a>
//       </div>

//     </div>
//   </div>
// </div>

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
      echo '<a class="selected">'.$page.'</a>';
    } else {
      echo '<a href="#">'.$page.'</a>';
    }
  }

  if($page_array[count($page_array)-1] < $num_pages) {
    echo '<span>...</span>';
  }
  
}



// get current page from request

// $num_pages = ceil(count($products) / 20);
$num_pages = 10;
if(isset($_REQUEST['page']) && intval($_REQUEST['page'] <= $num_pages)) {
  $current_page = $_REQUEST['page'];
} else {
  $current_page = 1;
}

// Show pagination if more than 1 page of results
if($num_pages > 1) {
  echo '
  <div class="content-block">
  <div class="pagination-container debug">
  <div class="pagination-wrapper">
  
  <div class="page-buttons">
  <a class="button prev"><i class="bi-caret-left-fill"></i>prev</button>
  <a class="button next">next<i class="bi-caret-right-fill"></i></button>
  </div>
  
        <div class="page-numbers">';
  echo getDisplayedPages();
  echo '</div>

      </div>
    </div>
  </div>';
  
}

  





?>