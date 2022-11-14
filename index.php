<?php
require('config.php');

?>

<form action="submit.php" method="post">
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="<?php echo $publishableKey ?>" data-amount="500" data-name="Vo-product" data-description="buy me prodduct" data-image="https://seeklogo.com/images/S/small-world-financial-service-logo-7E1D2B6258-seeklogo.com.png" data-currency="usd" data-email="asifaslamaimviz@gmail.com">
    </script>
</form>