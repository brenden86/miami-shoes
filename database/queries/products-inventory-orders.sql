SELECT
	products.prod_id,
    prod_name,
    brand,
    inventory.qty_in_stock,
    order_items.qty_ordered
FROM products
LEFT JOIN (
		SELECT prod_id, count(prod_id) AS qty_in_stock
        FROM inventory
        LEFT JOIN stock USING(sku)
        GROUP BY prod_id
) AS inventory ON products.prod_id = inventory.prod_id
LEFT JOIN (
	SELECT prod_id, count(prod_id) AS qty_ordered
	FROM order_items
	LEFT JOIN stock USING(sku)
	GROUP BY prod_id
) AS order_items ON products.prod_id = order_items.prod_id
ORDER BY prod_id;

