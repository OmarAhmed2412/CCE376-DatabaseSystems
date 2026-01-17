SELECT customer_name FROM customer WHERE customer_name LIKE 'Ma%';
SELECT order_id,SUM(order_item.quantity) AS itemCount,SUM(order_item.quantity * item.unit_price) AS TOTprice FROM order_item JOIN item ON order_item.item_id = item.item_id GROUP BY order_item.order_id;
SELECT shipment.order_id FROM warehouse JOIN shipment ON shipment.warehouse_id = warehouse.warehouse_id WHERE warehouse.warehouse_city = "Arica";

SELECT shipment.order_id,SUM(order_item.quantity * item.unit_price) AS TOTprice FROM warehouse
JOIN shipment ON shipment.warehouse_id = warehouse.warehouse_id
JOIN order_item ON order_item.order_id = shipment.order_id
JOIN item ON item.item_id = order_item.item_id 
WHERE warehouse.warehouse_id = 8
GROUP BY order_id;