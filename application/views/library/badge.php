<div class="card gredient-info-bg m-t-0 m-b-0">
    <div class="card-body">
        <h4 class="card-title text-white">My Wallet Balance</h4>
        <h5 class="card-subtitle text-white op-5"></h5>
        <div class="row m-t-30 m-b-20"> 
            <div class="col-sm-12 col-lg-12">
                <div class="row"> 
                    <div class="col-sm-12 col-md-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <i class="mdi mdi-wallet text-white display-5 op-5"></i>
                            </div>
                            <div style="margin-left: 10px">
                                <h3 class="text-white mb-0">
                                    <?php
                                        echo currency($this->stackingmodel->get_amount(),'2','');
                                    ?>
                                </h3>
                                <span class="text-white op-5">Stacking Balance</span>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <img src="assets/logo-nx.png" style="width: 75px;">
                            </div>
                            <div style="margin-left: 10px">
                                <h3 id="nxcBalance" class="text-white mb-0"></h3>
                                <span class="text-white op-5">NXCC Wallet</span>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-12 col-md-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <img src="assets/logo-nx.png" style="width: 75px;">
                            </div>
                            <div style="margin-left: 10px">
                                <h3 class="text-white mb-0"><?php echo currency($this->walletmodel->cek_balance('B'),'2','') ?></h3>
                                <span class="text-white op-5">Bonus Entry Wallet</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <img src="assets/logo-nx.png" style="width: 75px;">
                            </div>
                            <div style="margin-left: 10px">
                                <h3 class="text-white mb-0">
                                    <?php
                                        //$a = $this->walletmodel->cek_balance('C') * $this->walletmodel->getPriceNx();
                                        $a = $this->walletmodel->cek_balance('C') * $this->marketmodel->get_latest_price('USD');
                                        echo '$ '.number_format($a,2,'.',',');
                                     ?></h3>
                                <span class="text-white op-5">Jackpot Wallet</span>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <img src="http://pngimg.com/uploads/bitcoin/bitcoin_PNG47.png" style="width: 45px; filter: brightness(0) invert(1);">
                            </div>
                            <div style="margin-left: 10px">
                                <h3 id="btcBalance" class="text-white mb-0"></h3>
                                <span class="text-white op-5">BTC Wallet</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <img src="https://cdn4.iconfinder.com/data/icons/proglyphs-shopping-and-finance/512/Coin_-_Dollar-512.png" style="width: 55px; filter: brightness(0) invert(1);">
                            </div>
                            <div style="margin-left: 10px">
                                <h3 class="text-white mb-0"><?= number_format( $this->marketmodel->get_latest_price('USD'),2,'.',','); ?></h3>
                                <span class="text-white op-5">NXCC/USD</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <div class="info d-flex align-items-center">
                            <div class="m-r-10">
                                <img src="assets/logo-nx.png" style="width: 75px;">
                            </div>
                            <div style="margin-left: 10px">
                                <h3 class="text-white mb-0"><?= number_format( $this->stackingmodel->get_omset_jaringan(),2,'.',','); ?></h3>
                                <span class="text-white op-5">Referral Staking</span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    document.USERBTCBALANCE = $("#btcBalance").UserBalance({type:'btc'}).get();
    document.USERNXCBALANCE = $("#nxcBalance").UserBalance({type:'nxcc'}).get();
    
});
</script>