<?php 
$pageTitle = "Calculator";
$section = "calculator";
$bodyBG = "asgnBodyBg";

include('inc/header.php'); 

// Calculator Script v1
session_start();

if(!isset($_SESSION["left"])) {
    $_SESSION["left"] = 0;
}
if(!isset($_SESSION["reg"])) {
    $_SESSION["reg"] = 0;
}
if(!isset($_SESSION["op"])) {
    $_SESSION["op"] = "";
}
if(!isset($_SESSION["a"])) {
    $_SESSION["a"] = "";
}

if(isset($_POST["btnSubmit"])) {
    switch($_POST["btnSubmit"]) {
        case "CE":      
            $_SESSION["reg"] = substr(floatval($_SESSION["left"]), 0, -1);
            // echo $_SESSION["reg"];
            $_SESSION["left"] = $_SESSION["reg"];
        break;
        case "C":
            $_SESSION["reg"] = "";
            $_SESSION["left"] = "";
        break;
        case "Unary":
            $_SESSION["left"] = floatval($_SESSION["left"]) * -1;
        break;
        case "Sqrt":
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "sqrt";   
        break;
        case "Perc":
            $_SESSION["a"] = $_SESSION["reg"];
            // echo "a" . $_SESSION["a"];
            // $b = $_SESSION["left"];
            // echo "b" . $b;
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "%";
        break;
        case "Recip":
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "1/x";
        break;
        case "Minu":
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "-";
            $_SESSION["carryOp"] = "-";
        break;
        case "Plus":
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "+";
            $_SESSION["carryOp"] = "+";
        break;
        case "Mult":
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "*";
            $_SESSION["carryOp"] = "*";
        break;
        case "Divi":
            $_SESSION["reg"] = $_SESSION["left"];
            $_SESSION["left"] = "";
            $_SESSION["op"] = "/";
            $_SESSION["carryOp"] = "/";
        break;
        case "Equa":
        $eval = 'substr_count($_SESSION["left"],".") <= 1 && substr_count($_SESSION["reg"],".") <= 1';
        $errmesg = 'print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>"';
        $errmesg2 = 'print "<div class=\"welcome error\"><p>Cannot divide by Zero. Try again.</p></div>"';
            switch($_SESSION["op"]) {
                case "+":
                    if($eval){
                        $_SESSION["reg"] += floatval($_SESSION["left"]);
                    } else {
                        print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                    }
                break;
                case "-":
                    if($eval){
                       $_SESSION["reg"] -= floatval($_SESSION["left"]);
                    }  else {
                        print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                    }  
                break;
                case "*":
                    if($eval){
                        $_SESSION["reg"] *= floatval($_SESSION["left"]);
                    } else {
                         print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                    }
                break;
                case "/":
                    if($eval){
                        if(floatval($_SESSION["left"]) == 0){
                            print "<div class=\"welcome error\"><p>Can not divide by Zero. Try again.</p></div>";
                        }else {
                            $_SESSION["reg"] /= floatval($_SESSION["left"]);
                            break;  
                        }  
                    } else {
                        print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                    }
                break;
                case "sqrt":
                    if($eval){
                        $_SESSION["reg"] = sqrt(floatval($_SESSION["left"]));
                    } else {
                        print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                    }
                break;
                case "%":
                    if($eval){
                        $x = $_SESSION["reg"];
                        $y = floatval($_SESSION["a"]);
                        $j = ($y * (1-($x / 100)));
                        $k = $y - $j;
                        if ($_SESSION["carryOp"] == "+"){
                            $_SESSION["reg"] = $k + $y; 
                        }
                        else if ($_SESSION["carryOp"] == "-"){
                            $_SESSION["reg"] = ($k - $y) * -1;
                        }
                        else if ($_SESSION["carryOp"] == "*"){
                            $_SESSION["reg"] = ($y);
                        }
                        else if ($_SESSION["carryOp"] == "/"){
                            $_SESSION["reg"] = ($k - $y);
                        }
                        
                    } else {
                        print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                        // A × (1 − B/100)
                    }
                break;
                case "1/x":
                    if($eval){
                        $_SESSION["reg"] = 1 / floatval($_SESSION["left"]) ;
                    } else {
                        print "<div class=\"welcome error\"><p>To many decimals. Try again.</p></div>";
                    }
                break;
                default:
                break;
            }

            $_SESSION["left"] = $_SESSION["reg"];
            $_SESSION["op"] = "";
        break;
        default:
            // Just a number, store it
            $_SESSION["left"] .= $_POST["btnSubmit"];
        break;
    }
}
?>
<article>
  <div class="welcome">
    <h1>Assignment 6</h1>
    <p>For assignment 6</p>
<!--     <figure class="<?php echo $section; ?>">
        <img src="img/asgn5webApp.png" alt="Assignment 5">  
        <figcaption>Assignment 5</figcaption>
    </figure> -->
        <div> 
            <form class="testform" action="" method="post" name="test" id="test" accept-charset="utf-8">
                <input type="text" class="display" readonly="readonly" data-type="input-textbox" id="readout" name="readout" size="20" value="<?php echo $_SESSION["left"]; ?>" maxlength="20"/></p>
                <input type="hidden" name="register" value="">
                <input type="hidden" name="operation" value="">
                
                <button class="defButton" id="btnSubmitCE" name="btnSubmit"  type="submit" value="CE">CE</button>
                <button class="defButton" id="btnSubmitC" name="btnSubmit"  type="submit" value="C">C</button>
                <button class="defButton" id="btnSubmitUnary" name="btnSubmit"  type="submit" value="Unary">+-</button>
                <button class="defButton" id="btnSubmitSqrt" name="btnSubmit"  type="submit" value="Sqrt">&#8730;</button><br />

                <button class="defButton" id="btnSubmit7" name="btnSubmit"  type="submit" value="7">7</button>
                <button class="defButton" id="btnSubmit8" name="btnSubmit"  type="submit" value="8">8</button>
                <button class="defButton" id="btnSubmit9" name="btnSubmit"  type="submit" value="9">9</button>
                <button class="defButton" id="btnSubmitDivide" name="btnSubmit"  type="submit" value="Divi">/</button>
                <button class="defButton" id="btnSubmitPercent" name="btnSubmit"  type="submit" value="Perc">%</button><br />

                <button class="defButton" id="btnSubmit4" name="btnSubmit"  type="submit" value="4">4</button>
                <button class="defButton" id="btnSubmit5" name="btnSubmit"  type="submit" value="5">5</button>
                <button class="defButton" id="btnSubmit6" name="btnSubmit"  type="submit" value="6">6</button>
                <button class="defButton" id="btnSubmitMultiply" name="btnSubmit"  type="submit" value="Mult">*</button>
                <button class="defButton" id="btnSubmitRecip" name="btnSubmit"  type="submit" value="Recip">1/x</button><br />
                
                <button class="defButton" id="btnSubmit1" name="btnSubmit" type="submit" value="1">1</button>
                <button class="defButton" id="btnSubmit2" name="btnSubmit"  type="submit" value="2">2</button>
                <button class="defButton" id="btnSubmit3" name="btnSubmit"  type="submit" value="3">3</button>
                <button class="defButton" id="btnSubmitMinus" name="btnSubmit"  type="submit" value="Minu">-</button>
                <button class="defButton" id="btnSubmitEqual" name="btnSubmit"  type="submit" value="Equa">=</button><br />

                <button class="defButton" id="btnSubmit0" name="btnSubmit"  type="submit" value="0">0</button>
                <button class="defButton" id="btnSubmitDecimal" name="btnSubmit"  type="submit" value=".">.</button>
                <button class="defButton" id="btnSubmitPlus" name="btnSubmit"  type="submit" value="Plus">+</button>
            </form>
        </div>
    </div>
</article>
<script type="text/javascript">
    document.test.readout.focus();
</script> 
<?php include('inc/footer.php') ?>