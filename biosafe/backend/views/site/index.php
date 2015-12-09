<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Tervetuloa!</h1>

        <p class="lead">Olet Biosafen näytteenottojärjestelmän etusivulla.</p>

        <p><a href="http://www.biosafe.fi/"><img src="\advanced\backend\logo.png" alt="Biosafe"></a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Luo näytteenottosuunnitelma</h2>

                <p><br></p>

                <p><a class="btn btn-default" href="http://localhost:8383/advanced/backend/web/index.php?r=nos%2Fcreate">Luo näytteenottosuunnitelma &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Tarkastele näytteitä ja käsittele niitä</h2>
				<p><br></p>

                

                <p><a class="btn btn-default" href="http://localhost:8383/advanced/backend/web/index.php?r=nos%2Findex">Selaa ja käsittele &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Merkitse analysointitulokset</h2>

                <p><br></p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Merkitse tulokset &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
