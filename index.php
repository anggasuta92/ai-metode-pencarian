<?php
    $total_input = 3; // 3x3
    $random_num_range = ($total_input * $total_input) - 1;
    $inputx = array();
    $outputx = array();
    if(isset($_POST['random_number'])){
        
        //for input
        for($r=0; $r<$total_input; $r++){
            for($c=0; $c<$total_input; $c++){
                do{
                    $rnd = rand(0,(int)$random_num_range);
                    $x = isAvailable($rnd, $inputx);
                }while($x==1);
                $inputx[$r][$c] = $rnd;
            }
        }
        
        //for output
        for($r=0; $r<$total_input; $r++){
            for($c=0; $c<$total_input; $c++){
                do{
                    $rnd = rand(0,(int)$random_num_range);
                    $x = isAvailable($rnd, $outputx);
                }while($x==1);
                $outputx[$r][$c] = $rnd;
            }
        }
    }
    
    function isAvailable($numb, $arr){
        $count = 0;
        for($r=0; $r<count($arr); $r++){
            for($c=0; $c<count($arr[$r]); $c++){
                if($arr[$r][$c]==$numb){
                    $count++;
                }
            }
        }
        return $count;
    }
?>
<html>
    <head>
        <title>Artificial Intelligent</title>
        <style>
            input[type="text"] {
                border: none;
                height:40px;
                font-size:14pt;
                text-align:center;
                font-family:Tahoma;
            }
            
            .myButton {
            	-moz-box-shadow:inset 0px 1px 0px 0px #54a3f7;
            	-webkit-box-shadow:inset 0px 1px 0px 0px #54a3f7;
            	box-shadow:inset 0px 1px 0px 0px #54a3f7;
            	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #007dc1), color-stop(1, #0061a7));
            	background:-moz-linear-gradient(top, #007dc1 5%, #0061a7 100%);
            	background:-webkit-linear-gradient(top, #007dc1 5%, #0061a7 100%);
            	background:-o-linear-gradient(top, #007dc1 5%, #0061a7 100%);
            	background:-ms-linear-gradient(top, #007dc1 5%, #0061a7 100%);
            	background:linear-gradient(to bottom, #007dc1 5%, #0061a7 100%);
            	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#007dc1', endColorstr='#0061a7',GradientType=0);
            	background-color:#007dc1;
            	-moz-border-radius:3px;
            	-webkit-border-radius:3px;
            	border-radius:3px;
            	border:1px solid #124d77;
            	display:inline-block;
            	cursor:pointer;
            	color:#ffffff;
            	font-family:Arial;
            	font-size:13px;
            	padding:6px 24px;
            	text-decoration:none;
            	text-shadow:0px 1px 0px #154682;
            }
            .myButton:hover {
            	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0061a7), color-stop(1, #007dc1));
            	background:-moz-linear-gradient(top, #0061a7 5%, #007dc1 100%);
            	background:-webkit-linear-gradient(top, #0061a7 5%, #007dc1 100%);
            	background:-o-linear-gradient(top, #0061a7 5%, #007dc1 100%);
            	background:-ms-linear-gradient(top, #0061a7 5%, #007dc1 100%);
            	background:linear-gradient(to bottom, #0061a7 5%, #007dc1 100%);
            	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0061a7', endColorstr='#007dc1',GradientType=0);
            	background-color:#0061a7;
            }
            .myButton:active {
            	position:relative;
            	top:1px;
            }
        </style>
    </head>
    <body>
        <form name="frmai" action="" method="post">
            <!-- INPUT BOX -->
            <table width="400">
                <tr>
                    <td colspan="3">
                        <strong><u>Petunjuk</u></strong>
                        <p style="text-align:justify">
                            Inputkan angka secara acak kedalam table input dan output, atau gunakan tombol Random Number untuk membuat angka secara acak. Kemudian klik tombol Start untuk memulai proses.
                        </p>
                    </td>
                </tr>
                <tr height="30px">
                    <td></td>
                </tr>
                <tr>
                    <td>Input</td>
                    <td>&nbsp;</td>
                    <td>Output</td>
                </tr>
                <tr>
                    <td>
                        <table width="auto" style="border-collapse:collapse" border="1" cellspacing="0" cellpadding="0">
                        <?php for($r=0; $r<$total_input; $r++){ ?>
                            <tr>
                            <?php for($c=0; $c<$total_input; $c++){ ?>
                                <?php
                                    $val_input = "";
                                    if(isset($inputx) && !empty($inputx)){
                                        $val_input = $inputx[$r][$c];
                                    }
                                ?>
                                <td><input type="text" name="inputx[]" size="1" value="<?php echo $val_input; ?>" /></td>
                            <?php } ?>
                            </tr>
                        <?php } ?>
                        </table>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                        <table width="auto" style="border-collapse:collapse" border="1" cellspacing="0" cellpadding="0">
                        <?php for($r=0; $r<$total_input; $r++){ ?>
                            <tr>
                            <?php for($c=0; $c<$total_input; $c++){ ?>
                                <?php
                                    $val_output = "";
                                    if(isset($outputx) && !empty($outputx)){
                                        $val_output = $outputx[$r][$c];
                                    }
                                ?>
                                <td><input type="text" name="outputx[]" size="1" value="<?php echo $val_output; ?>" /></td>
                            <?php } ?>
                            </tr>
                        <?php } ?>
                        </table>
                    </td>
                </tr>
                <tr height="30px">
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" class="myButton" name="random_number" value="Random Number"/>
                        <input type="submit" class="myButton" name="start_proccess" value="Start Proccess"/>
                        <a href="" class="myButton">Reset</a>
                    </td>
                </tr>
            </table>
            <!-- INPUT BOX -->
        </form>        
    </body>
</html>