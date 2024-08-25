<?php
    class cls_KetNoi{
        public function OpenConnect(){
            $con= mysqli_connect("sql307.infinityfree.com", "if0_36815488", "PKPZpEnupz9HxIh", "if0_36815488_qloc2");
            mysqli_set_charset($con, 'utf8');
            return $con;
        }

        public function DongKetNoi($con){
            mysqli_close($con);
        }
    }
?>