<!--<?php
include('functions.php');
?>-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link href="style.css" type="text/css" rel="stylesheet"/>
<title>SHADOW</title>
<link rel="icon" href="image/logo.png">


</head>
<!-- Header & Nav -->
<header>
<a href="index.php"><img src="image/logo2.png" alt="logo" class="logo"></a>

<nav>
<a href="index.php">HOME</a>
<a href="shop.php">SHOP</a>

 <?php  if (isset($_SESSION['user'])){  ?>
                <strong style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size:28px"><?php echo $_SESSION['user']['lastname']; ?></strong>
                <small>
                     <i style="color: #888; font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                </small>
            <a href="index.php?logout='1'" >Logout</a>
            <?php
            }
            else
            {
            echo '<a href="login.php">LOG IN</a><a href="register.php">REGISTER</a>
                  ';
            }
            ?>
<a href="cart.php"><img width="30px" height="25px" src="image/cart.png"><?php
                        if (isset($_SESSION['cart_item'])){
                            $count = count($_SESSION['cart_item']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        } else {
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }
                    ?></a>

</nav>


</header>
<body>


<h5 style="font-family:'Lucida Sans Unicode', 'Lucida Grande', sans-serif">Shipping Information</h5>
<p style="text-align: justify">
Our ability to ship your order to you is only as good as the information that you provide us. Whether you are ordering products for yourself or others, you must ensure that you provide us with an precise address. We cannot be held responsible for delivery failures if you don't give us the correct address or if it is an address that we can't perform delivery to.
If a shipment is returned as unclaimed, undeliverable, regardless of the reason, we shall be entitled to keep you liable for the shipping and handling fees that were associated with that shipment. Deliveries are not available for P.O. Box address. Please check to see that your rental agreement includes signed for/registered items. We highly recommend the items you've ordered to be sent to a work or home address due to the signed for nature of deliveries.
Shipping will be done according to the costs and methods described on our website. Once we ship your item, we are no longer responsible for its condition or delivery to your chosen address. Any claims for damages on the item should be filed by you against the shipper.
<br>
<br>
<b>Domestic Shipping</b><br>
All domestic order will be shipped by Gdex courier service.
Available/in stock goods usually are shipped within a few days after you have placed your order.  Ensure your submitted shipping address is correct. Shadow is in no way taking the responsibility of shipment to the wrong address.  *Please allow 1-3 working days for ground shipping. Delivery times do not include Saturdays, Sundays and Public Holidays. The shipping cost will be given on checkout from your cart before you pay.
<br>
<br>
<b>International Shipping</b><br>
International order will be shipped by either FedEx or TNT Express.
There are probability of your packages may be delayed due to custom clearance, in this case, it is beyond our control whether your package is delayed in your country's customs or not. By placing an order with us, you have acknowledged to bear the risks that your package may be delayed during shipment for these reasons. Shadow reserve the rights to request additional fees for large shipment or drop the order. We do not deliver to P.O BOX.
*International standard shipping takes 3 up to 10 business days, excluding Saturdays, Sundays and Public Holidays. ** Shipping cost will be shown after checking out
<br>
<br>
<b>Express shipping</b><br>
Express shipping is only available to selected countries if shown at checkout, we also hold the right to refuse express shipping on certain orders.
<br>
<br>
<b>Customs and GST</b><br>
Shadow ships all orders from Malaysia who is a part of the ASEAN and follow the ASEAN's laws and customs.
For customers in countries within the Malaysia's customs and all prices shown on the website is what you pay for. No additional fees, GST or custom charges will apply after shipping or delivery.
<br>
<br>
For customers in countries outside the Malaysia's customs, the respective country's customs and tax charges apply. Contact your country's customs authorities for precise information. You can also try to contact your local TNT Express office to see if they can help you. Shadow are required to declare full value of the goods and cannot declare that the consignment would be a "gift" or lower the value. In cases where TNT Express handles the tax and custom fees in order to offer a speedy delivery, TNT Express may add an extra fee for the extra handling. Contact your local TNT Express office for more information. You can find contact information here.
</p>

<!--Footer-->
<footer>
    <div class="footer-left">
    <a href="index.php"><img src="image/logo2.png" alt="logo" class="footer-logo"></a>
    <p>Shadow Sdn. Bhd. is a street wear clothing company
        and also a street wear retailer; It is founded by Pan
        Chen Pong in the year of 2017. Our core values are
        promoting Malaysia and other countries' subculture
        through streetwear.  </p>
        <img class="payment" src="image/payment.png">
        <div class="copyright">
            &copy; SHADOW 2020
        </div>
</div>
    <div class="footer-mid">
    <p class="footer-subheader">ABOUT</p><br>
    <a href="aboutUs.php">About Us</a><br>
    <a href="contactUs.php">Contact Us</a><br>

   
</div>
    <div class="footer-right">
        <p class="footer-subheader">CUSTOMER SERVICE</p><br>
        <a href="shipping.php">Shipping Information</a><br>
        <div class="socialmedia">
            <p>Follow us on all our social media!</p>
        <a href="https://www.facebook.com/"><img class="face" src="image/fb.png"></a>
        <a href="https://www.twitter.com/"><img class="twt" src="image/twitter.png"></a>
        <a href="https://www.instagram.com/"><img class="insta" src="image/insta.png"></a>
        <a href="https://www.youtube.com/"><img class="youtube" src="image/youtube.png"></a>
    
        </div>
        
        

    </div>
</footer>
</html>