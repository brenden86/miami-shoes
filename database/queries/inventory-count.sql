SELECT prod_id, COUNT(prod_id) AS "#_in_stock"
FROM stock
LEFT JOIN inventory USING(sku) GROUP BY prod_id;