<?php
$N = 0;
$S = 0;
$F = 0;
$T = 0;
$J = 0;
$P = 0;
if (isset($_POST['submit'])) {
    if(isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4']) && isset($_POST['5']) && isset($_POST['6'])
    && isset($_POST['7']) && isset($_POST['8']) && isset($_POST['9']) && isset($_POST['10']) && isset($_POST['11']) && isset($_POST['12'])
    && isset($_POST['13']) && isset($_POST['14']) && isset($_POST['15'])
    )
    {
        if($_POST['1'] == 'a'){++$N;}
        else if($_POST['1'] == 'b'){++$S;}

        if($_POST['2'] == 'a'){++$T;}
        else if($_POST['2'] == 'b'){++$F;}

        if($_POST['3'] == 'a'){++$J;}
        else if($_POST['3'] == 'b'){++$P;}

        if($_POST['4'] == 'a'){++$T;}
        else if($_POST['4'] == 'b'){++$F;}
        
        if($_POST['5'] == 'a'){++$J;}
        else if($_POST['5'] == 'b'){++$P;}

        if($_POST['6'] == 'a'){++$N;}
        else if($_POST['6'] == 'b'){++$S;}

        if($_POST['7'] == 'a'){++$T;}
        else if($_POST['7'] == 'b'){++$F;}

        if($_POST['8'] == 'a'){++$S;}
        else if($_POST['8'] == 'b'){++$N;}

        if($_POST['9'] == 'a'){++$P;}
        else if($_POST['9'] == 'b'){++$J;}

        if($_POST['10'] == 'a'){++$S;}
        else if($_POST['10'] == 'b'){++$N;}

        if($_POST['11'] == 'a'){++$P;}
        else if($_POST['11'] == 'b'){++$J;}

        if($_POST['12'] == 'a'){++$F;}
        else if($_POST['12'] == 'b'){++$T;}

        if($_POST['13'] == 'a'){++$T;}
        else if($_POST['13'] == 'b'){++$F;}

        if($_POST['14'] == 'a'){++$J;}
        else if($_POST['14'] == 'b'){++$P;}

        if($_POST['15'] == 'a'){++$N;}
        else if($_POST['15'] == 'b'){++$S;}

        // if($S > $N){
        //     if($J > $P){echo "SJ - นักบริหาร มีความโดดเด่นเรื่องการบริหารงาน และบุคลากร";}
        //     else{echo "SP - นักปฏิบัติ ฉลาด กระฉับกระเฉง กระตือรือร้น มีความพร้อมในการทำสิ่งใหม่ๆ เสมอ มีความชำนาญในการใช้เครื่องมือต่าง ๆ";}
        // }
        // else{
        //     if($F > $T){echo "NF - นักพูด มีเสน่ห์ มักสร้างแรงบัลดาลใจให้ผู้ฟังได้เสมอ";}
        //     else{echo "NT - ผู้มีเหตุผล เป็นนักออกแบบที่ดี มีกลยุทธ์เพื่อรองรับทุกสถานการณ์";}
        // } 
        if($S > $N){
            if($J > $P){echo "4";}
            else{echo "1";}
        }
        else{
            if($F > $T){echo "3";}
            else{echo "2";}
        } 
    }else{ 
        echo "<script language=\"JavaScript\">";
        echo "alert('Please answer all questions.')";
        echo "</script>";
    }
}
?>