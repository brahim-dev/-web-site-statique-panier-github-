<?php 
// include('includes/templates/header.php');
include('includes/functions/db.php');
try{
    $dbClass=new database();
    $dbh=$dbClass->getDb();
  }catch(PDOException $e)
  {
    $e->getMessage();
  }

//debut de la fonction getProduct
  function getProduct(){
     global $dbh;
    $query= "SELECT * FROM `products` ORDER BY 1 DESC LIMIT 0,8";
    $statement = $dbh->query($query);
    foreach($statement as $product){
        $pro_id = $product['product_id'];
        $pro_img1 = $product['product_img1'];
        $pro_title = $product['product_title'];
        $pro_price = $product['product_price'];
        $pro_pricedd = $product['product_price']+10;
    echo "
                    
    <div class='col-md-3 col-sm-6 col-xs-6'>
            <div class='product product-single'>
            <div class='product-thumb'>
            <div class='product-label'>
            <span>New</span>
            <span class='sale'>-20%</span>
            </div>
            <a href='product-page.php?pro_id=$pro_id'><button class='main-btn quick-view'><i class='fa fa-search-plus'></i> Quick view</button></a>
            <img  src='$pro_img1'>
            </div>
            <div class='product-body'>
            <h3 class='product-price'>$$pro_price<del class='product-old-price'>$$pro_pricedd</del></h3>
            <div class='product-rating'>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
            <i class='fa fa-star-o empty'></i>
            </div>
            <h2 class='product-name'><a href='product-page.php?pro_id=$pro_id'>$pro_title </a></h2>
            <div class='product-btns'>
            <button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
            <button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
            <a href='cart.php?pro_id=$pro_id'><button class='primary-btn add-to-cart'><i class='fa fa-shopping-cart'></i> Add to Cart</button></a>
            </div>
            </div>
            </div>
            </div>
                    
                    ";
                    
            }
    
  }
  
  function getProductShop(){
     global $dbh;
     //$query= "SELECT * FROM `products` ORDER BY 1 DESC LIMIT 0,8";
     $query= "SELECT * FROM `products`";
     $statement = $dbh->query($query);
     foreach($statement as $product){
         $pro_id = $product['product_id'];
         $pro_img1 = $product['product_img1'];
         $pro_title = $product['product_title'];
         $pro_price = $product['product_price'];
         $pro_pricedd = $product['product_price']+10;
     echo "
                     
     <div class='col-md-4 col-sm-6 col-xs-6'>
             <div class='product product-single'>
             <div class='product-thumb'>
             <div class='product-label'>
             <span>New</span>
             <span class='sale'>-20%</span>
             </div>
             <a href='product-page.php?pro_id=$pro_id'><button class='main-btn quick-view'><i class='fa fa-search-plus'></i> Quick view</button></a>
             <img  src='$pro_img1'>
             </div>
             <div class='product-body'>
             <h3 class='product-price'>$$pro_price<del class='product-old-price'>$$pro_pricedd</del></h3>
             <div class='product-rating'>
             <i class='fa fa-star'></i>
             <i class='fa fa-star'></i>
             <i class='fa fa-star'></i>
             <i class='fa fa-star'></i>
             <i class='fa fa-star-o empty'></i>
             </div>
             <h2 class='product-name'><a href='product-page.php?pro_id=$pro_id'>$pro_title </a></h2>
             <div class='product-btns'>
             <button class='main-btn icon-btn'><i class='fa fa-heart'></i></button>
             <button class='main-btn icon-btn'><i class='fa fa-exchange'></i></button>
             <a href='cart.php?pro_id=$pro_id'><button class='primary-btn add-to-cart'><i class='fa fa-shopping-cart'></i> Add to Cart</button></a>
             </div>
             </div>
             </div>
             </div>
                     
                     ";
                     
             }

  }


  function getPro($product_id){
      global $dbh;
       $product = array();
       $query = "SELECT * FROM `products` WHERE product_id = :pro_id";
       $statement = $dbh->prepare($query);  
       $statement->execute(  
            array(  
                 'pro_id'     =>     $product_id  
            )  
       );
       $data = $statement->fetch();
       $count = $statement->rowCount();  
       if($count > 0)  
       {  
            $product['id'] = $data["product_id"]; 
            $product['title'] = $data["product_title"];   
            $product['price'] = $data["product_price"]; 
            $product['desc'] = $data["product_desc"]; 
            $product['img1'] = $data["product_img1"]; 
            $product['img2'] = $data["product_img2"]; 
            $product['img3'] = $data["product_img3"]; 
            $product['p_cat_id'] = $data["p_cat_id"]; 
            $query2 = "SELECT * FROM `product_sub_categories` WHERE p_cat_id = :p_cat_id";
            $statement2 = $dbh->prepare($query2); 
            $statement2->execute(  
                array(  
                     'p_cat_id'     =>     $product['p_cat_id']  
                )  
           );
           $data2 = $statement2->fetch();
           if($count > 0){
               $product['p_cat_title']= $data2['p_cat_title'];
           }else{
            $product['p_cat_title']="no product category";
           }
       }  
       else  
       {  
            $message = '<label>Error no product</label>';  
       }  

       return $product;
  }
function getSlider(){
     global $dbh;
     $query= "SELECT * FROM `slider`";
     $statement = $dbh->query($query);
     foreach($statement as $slider){
          $slide_name = $slider['slide_name'];
          $slide_image = $slider['slide_image'];
          echo "
                       
          <div class='banner banner-1'>
                 <img style='height: 490px;' src='$slide_image'>
            </div>

          
          ";

     }
}


function getCats(){
     global $dbh;
     $query= "SELECT * FROM `categories`";
     $statement = $dbh->query($query);
     foreach($statement as $category){
          $cat_id = $category['cat_id'];
          $cat_title = $category['cat_title'];
          echo "
        
          <li class='dropdown side-dropdown'>
                          <a href='products.php?cat=$cat_id' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='true'>$cat_title<i class='fa fa-angle-right'></i></a>
                          <div class='custom-menu'>
                              <ul class='list-links'>
                                  <li><h3 class='list-links-title'>Categories</h3></li>
                                 
          <li>";
          $query2 = "SELECT * FROM `product_sub_categories` WHERE cat_id = :cat_id";
          $statement2 = $dbh->prepare($query2);  
          $statement2->execute(  
               array(  
                    'cat_id'     =>     $cat_id 
               )  
          );
          foreach($statement2 as $sub_category){
               $p_cat_id = $sub_category['p_cat_id'];
                        
               $p_cat_title = $sub_category['p_cat_title'];
               
               echo "
               
                   <li>
                   
                       <a href='products.php?p_cat=$p_cat_id'> $p_cat_title </a>
                   
                   </li>
               
               ";
          }
          echo "
          </li>
                              </ul>
                          </div>
                      </li>
      
      ";
     }
}

function insertIncart($p_id,$client_id,$qty){
     global $dbh;
     try{
     $sql = "INSERT INTO `panier`(`p_id`, `client_id`, `qty`) VALUES (?,?,?)";
     $reqst= $dbh->prepare($sql);
     $reqst->execute([$p_id,$client_id,$qty]);
   }catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
}

function addComment($name,$comment){
     global $dbh;
     try{
     $sql = "INSERT INTO `comment`(`id`, `name`, `comment`) VALUES (?,?,?)";
     $reqst= $dbh->prepare($sql);
     $reqst->execute([0,$name,$comment]);
   }catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
}

function addOrder($client_id,$client_name,$email,$adresse,$zip,$phone,$products,$total){
   global $dbh;
   try{
     $sql = "INSERT INTO `commande`(`order_id`, `client_id`, `client_name`, `email`, `adresse`, `zip`, `phone`, `products`, `total`) VALUES (?,?,?,?,?,?,?,?,?)";
     $reqst= $dbh->prepare($sql);
     $reqst->execute([0,$client_id,$client_name,$email,$adresse,$zip,$phone,$products,$total]);
   }catch(PDOException $e)
   {
   echo $sql . "<br>" . $e->getMessage();
   }
}

?>