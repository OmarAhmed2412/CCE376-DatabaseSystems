SELECT w.warehouse_id,w.warehouse_city,COUNT(s.order_id) AS countOfOrders FROM warehouse AS w 
LEFT JOIN shipment AS s ON w.warehouse_id = s.warehouse_id
GROUP BY warehouse_id;

SELECT c.customer_name, COUNT(o.order_id) AS countOfOrders FROM customer AS c 
LEFT JOIN `order` AS o ON c.customer_id = o.customer_id
GROUP BY c.customer_id

SELECT item_id AS unorderedItemIds FROM item
WHERE item_id NOT IN (SELECT item_id FROM order_item)

SELECT item.item_id FROM item LEFT JOIN order_item ON item.item_id = order_item.item_id
 GROUP by item.item_id 
 having COUNT(order_id) = 0