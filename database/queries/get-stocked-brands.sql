-- get brands that are stocked (not necessarily IN stock) 
SELECT DISTINCT brand
FROM stock
LEFT JOIN products USING(prod_id)
ORDER BY brand ASC;