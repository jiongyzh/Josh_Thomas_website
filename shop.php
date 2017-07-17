<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'topper.php';?>
    <title>Shop</title>
</head>
    <script>
    function getSubTotal(season,qty,eleId) {
        var subtotal;
        var uniprice;
        switch(season){
            case "plm[s1]":
                uniprice=17.00; break;
            case "plm[s2]":
                uniprice=22.50; break;
            case "plm[s3]":
                uniprice=26.75;  break;
            default:
                uniprice=0; break;
        }
        //Set subtotal
        subtotal = uniprice * qty;
        document.getElementById(eleId).innerHTML = subtotal.toFixed(2);
        updateTotal();

    }

    function updateTotal(){
        var totalprice = 0;

        totalprice = totalprice
            +Number(document.getElementById("subtotal01").innerHTML)
            +Number(document.getElementById("subtotal02").innerHTML)
            +Number(document.getElementById("subtotal03").innerHTML);

        document.getElementById('total').innerHTML=totalprice.toFixed(2);

    }

    </script>
<body>
<?php include 'header.php';?>
        <main id="smain">
            <div id="title"> </div>
            <form id="sform" action="session.php" method="post">
                <div id="seasonlist">
                    <div class="seasonbox" id="season1">
                        <br> <img class="season-img" src="images/season1.jpeg" title="Season1" alt="Season1">
                        <h3>Please Like Me, Season 1</h3>
                        <p id="s1-des-title" class="s-des-title"> <b>Description</b> </p>
                        <br>
                        <p id="s1-des-content" class="s-des-content"> With his 21st birthday just around the corner, life finally seems to be coming together for Josh (Josh Thomas). </p>
                        <br>
                        <details id="s-detail1" class="s-detail">
                            <summary class="s-summary">More details</summary>
                            <p id="s1-more-detail" class="s-des-content"> He’s sharing a house with his best (and only) friend, Tom (Tom Ward), his dog, John, and Tom’s rabbit, $haniqua, and he’s doing adult things like cooking roast chickens and eating asparagus. But the events of one day throw his world into chaos. He’s dumped by his girlfriend, Claire (Caitlin Stasey), and introduced to a decidedly odd but very attractive man, Geoffrey (Wade Briggs). And when his divorced mum, Rose (Debra Lawrance), overdoses on pain killers, Josh is forced to move back into the family home to keep an eye on her. If that’s not enough, he has to deal with his dad Alan’s (David Roberts) guilt over his ex-wife and clumsy attempts to hide his new, younger girlfriend, Mae (Renee Lim). It’s all a bit more than Josh had planned for - which was just to plate up a tasty dinner. </p>
                        </details>
                        <br>
                        <p class="unit-price">Unit Price: $17.00</p>
                        <br>
                        <div id="s1-select-container" class="select-container">
                            <p class="s-select-version">
                                <label class="s-select-label" for="s-quantity1">Quantity</label>
                                <br>
                                <select class="s-select-form" id="s-quantity1" name="plm[s1]" onchange="getSubTotal(this.name,this.value,'subtotal01')">
                                    <option value="0" selected="selected">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </p>
                            <P class="subtotal-price">Subtotal: </P>
                            <p id="subtotal01" class="subtotal"></p>
                            <br>
                            <div class="s-link-form"> <a href='https://itunes.apple.com/au/tv-season/please-like-me-season-1/id616877503'>iTunes</a>
                                <br> <a href='https://www.amazon.com/Rhubarb-and-Custard/dp/B00G5Z4VMM/ref=sr_1_1?s=instant-video&ie=UTF8&qid=1444384957&sr=1-1&keywords=please+like+me'>Amazon Video</a> </div>
                        </div>
                    </div>
                    <div class="seasonbox" id="season2">
                        <br> <img class="season-img" src="images/season2.jpeg" title="Season2" alt="Season2">
                        <h3>Please Like Me, Season 2</h3>
                        <p id="s2-des-title" class="s-des-title"> <b>Description</b> </p>
                        <br>
                        <p id="s2-des-content" class="s-des-content"> The award-winning Please Like Me, created by Josh Thomas, is back. </p>
                        <br>
                        <details id="s-detail2" class="s-detail">
                            <summary class="s-summary">More details</summary>
                            <p id="s2-more-detail" class="s-des-content"> In Season Two, Josh tries to get through the day without upsetting anyone. There's a new dog, a new rabbit and a new baby. There’s no big twist. It isn't Lost. </p>
                        </details>
                        <br>
                        <p class="unit-price">Unit Price: $22.50</p>
                        <br>
                        <div id="s2-select-container" class="select-container">
                            <p class="s-select-version">
                                <label class="s-select-label" for="s-quantity2">Quantity</label>
                                <br>
                                <select class="s-select-form" id="s-quantity2" name="plm[s2]" onchange="getSubTotal(this.name,this.value,'subtotal02')">
                                    <option value="0" selected="selected">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </p>
                            <P class="subtotal-price">Subtotal: </P>
                            <p id="subtotal02" class="subtotal"></p>
                            <br>
                            <div class="s-link-form"> <a href='https://itunes.apple.com/au/tv-season/please-like-me-season-2/id906508728'>iTunes</a>
                                <br> <a href='https://www.amazon.com/Sausage-Sizzle/dp/B00MJOADIO/ref=sr_1_1?s=instant-video&ie=UTF8&qid=1473580448&sr=1-1&keywords=please+like+me+2'>Amazon Video</a> </div>
                        </div>
                    </div>
                    <div class="seasonbox" id="season3">
                        <br> <img class="season-img" src="images/season3.jpeg" title="Season3" alt="Season3">
                        <h3>Please Like Me, Season 3</h3>
                        <p id="s3-des-title" class="s-des-title"> <b>Description</b> </p>
                        <br>
                        <p id="s3-des-content" class="s-des-content"> In season three, new characters arrive, complications ensue, and a cast of extraordinary performers competes again for screen time with John the cavoodle. </p>
                        <br>
                        <details id="s-detail3" class="s-detail">
                            <summary class="s-summary">More details</summary>
                            <p id="s3-more-detail" class="s-des-content"> Josh and Tom acquire new housemates: some fluffy, innocent baby chickens. Josh is also trying to acquire a new boyfriend, the anxiety-ridden Arnold, but Arnold is struggling to commit. </p>
                        </details>
                        <br>
                        <p class="unit-price">Unit Price: $26.75</p>
                        <br>
                        <div id="s3-select-container" class="select-container">
                            <p class="s-select-version">
                                <label class="s-select-label" for="s-quantity3">Quantity</label>
                                <br>
                                <select class="s-select-form" id="s-quantity3" name="plm[s3]" onchange="getSubTotal(this.name,this.value,'subtotal03')">
                                    <option value="0" selected="selected">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </p>
                            <P class="subtotal-price">Subtotal: </P>
                            <p id="subtotal03" class="subtotal"></p>
                            <br>
                            <br>
                            <div class="s-link-form"> <a href='https://itunes.apple.com/au/tv-season/please-like-me-season-3/id1047334958'>iTunes</a>
                                <br> <a href='https://www.amazon.com/dp/B016Q9W2NQ/ref=cm_sw_su_dp'>Amazon Video</a> </div>
                        </div>
                    </div>
                </div>
                <div id="media">
                    <label id="label-media" for="select-media">Media</label>
                    <br>
                    <select id="select-media" name="Media">
                        <option value="BluRay">BluRay</option>
                        <option value="DVD">DVD</option>
                    </select>
                    <P id="total-price">Total Price: </P>
                    <p id="total"></p>
                </div>
                <div>
                    <button id="checkout">ADD TO CART</button>
                </div>
            </form>
        </main>
    </div>
    <?php include 'footer.php';?>
    </body>

    </html>