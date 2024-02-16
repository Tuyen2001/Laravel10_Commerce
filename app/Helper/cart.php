<?php
    namespace App\Helper;
    class Cart{
        private $items = [];
        private $total_quantity = 0;
        private $total_price = 0;
        public function __construct(){
            $this->items = session('cart') ? session('cart') :[];

        }
        //pt lấy về danh sách và sản phẩm trong giỏ

        public function list(){
            return $this->items;
        }

        // thêm mới sản phẩm và giỏ hàng
        public function add($product,$quantity =1){
            $item = [
                'productId' =>$product->id,
                'name' =>$product->name,
                'price'=>$product->sale_price > 0 ? $product->sale_price : $product->price,
                'image'=>$product->image,
                'quantity'=>$quantity
            ];
            $this->items[$product->id] =$item;
            session(['cart'=>$this->items]);
        }
        //cập nhật giỏ hàng

        //xóa sp khỏi giỏ hàng

        // xóa hết sp khỏi giỏ hàng

        // phương thức lấy tổng tiền các sp

        public function getTotalPrice(){
            $totalPrice = 0;
            foreach($this->items as $item){
                $totalPrice += $item['price'] * $item['quantity'];
            }
            return $totalPrice;
        }

        //phương thức lấy số lượng
        public function getTotalQuantity(){
            $totalQuantity = 0;
            foreach($this->items as $item){
                $totalQuantity += $item['quantity'];
            }
            return $totalQuantity;
        }
    }


?>
