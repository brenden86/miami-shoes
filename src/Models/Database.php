<?php
namespace MiamiShoes\Models;

use PDO;
use PDOException;

$env = parse_ini_file(__DIR__.'/../../.env');

class Database extends PDO {

    public function queryAndFetch($sql) {
        try {
            return $this->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getColorVariants($prod_name, $gender) {

        $query = "
            SELECT
                prod_id,
                prim_color,
                sec_color
            FROM products
            WHERE prod_name = :name
            AND gender = :gender";

        try {
            return $this
                ->prepare($query)
                ->execute(['name' => $prod_name, 'gender' => $gender])
                ->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getSizesInStock($prod_id) {

        $query = "
            SELECT
              sku,
              prod_id,
              size,
              count(inventory.sku) AS qty
            FROM stock
            LEFT JOIN inventory USING(sku)
            WHERE prod_id = :id
            GROUP BY sku
        ";

        try {
            return $this
                ->prepare($query)
                ->execute(['id' => $prod_id])
                ->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getProductDetails($prod_id) {

        $query = "
            SELECT prod_detail
            FROM prod_details
            WHERE prod_id = :id
        ";

        try {
            return $this
                ->prepare($query)
                ->execute(['id' => $prod_id])
                ->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getQtyInStock($sku) {
        $query = "
            SELECT count(sku) AS qty
            FROM inventory
            WHERE sku = :sku
        ";
        try {
            return $this
                ->prepare($query)
                ->execute(['sku' => $sku])
                ->fetch(PDO::FETCH_ASSOC)["qty"];
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }


}