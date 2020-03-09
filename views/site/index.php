<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

?>

<div class="site-index">

    <div class="jumbotron hero-text">
        <h1>Welcome to Trip Deal !</h1>

        <p>The No.1 Portal for Car Sharing</p>

        <p><a class="btn btn-lg btn-success" href=""><span class="glyphicon glyphicon-search"></span>&nbsp&nbspFind a Ride</a></p>
        <p><a class="btn btn-lg btn-primary" href=""><span class="glyphicon glyphicon-plus"></span>&nbsp&nbspOffer a Ride</a></p>

    </div>

    <div class="body-content hero-text">

        <div class="row">
            <div class="col-lg-4">
                <h2>Smart</h2>

                <p>With access to millions of journeys, you can quickly find people nearby travelling your way.</p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>Simple</h2>

                <p>Enter your exact address to find the perfect ride. Choose who you’d like to travel with. And book!

                </p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p> -->
            </div>
            <div class="col-lg-4">
                <h2>Seamless</h2>

                <p>Get to your exact destination, without the hassle. No queues. No waiting around.

                </p>

                <!-- <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> -->
            </div>
        </div>

    </div>
</div>

<?php

$script = <<< JS
        $(document).ready(
            setTimeout(
                function(){
                    $(".alert-success").fadeOut("5000")
                }, 5000
            )
        );
JS;
$this->registerJs($script);
?>