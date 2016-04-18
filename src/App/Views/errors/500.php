<?php header("Content-Type: text/html; charset=UTF-8"); ?>
<!DOCTYPE html>
<!-- saved from url=(4251)https://www.google.ru/search?newwindow=1&output=search&sclient=psy-ab&q=%3Cdiv+class%3D%22col-md-9%22%3E+%3Cform+enctype%3D%22multipart%2Fform-data%22+action%3D%22%2Findex%2FsaveAssignment%22+method%3D%22POST%22+onsubmit%3D%22return+getDataTextEditor()%3B%22%3E+%3Cdiv+class%3D%22panel+panel-default%22%3E+%3Cdiv+class%3D%22panel-heading%22%3E+%3Cspan+class%3D%22glyphicon+glyphicon-edit%22%3E%3C%2Fspan%3E%3Cstrong%3E+%D0%9D%D0%BE%D0%B2%D0%BE%D0%B5+%D0%B7%D0%B0%D0%B4%D0%B0%D0%BD%D0%B8%D0%B5%3C%2Fstrong%3E+%3C%2Fdiv%3E+%3Cdiv+class%3D%22panel-body%22%3E+%3Cdiv+class%3D%22form-group%22%3E+%3Ctable+id%3D%22tableAssignment%22+class%3D%22table-condensed%22+style%3D%22margin-bottom%3A+17px%3B%22%3E+%3Ctr%3E+%3Ctd%3E%D0%90%D0%B4%D1%80%D0%B5%D1%81%D0%B0%D1%82%3C%2Ftd%3E+%3Ctd%3E+%3Cinput+type%3D%22text%22+name%3D%22address%22+class%3D%22form-control%22+style%3D%22width%3A+450px%3B%22+disabled%3E+%3C%2Ftd%3E+%3Ctd%3E+%3Cbutton+type%3D%22button%22+class%3D%22btn+btn-success+btn-xs%22+onclick%3D%22insertRow()%22%3E+%3Cspan+class%3D%22glyphicon+glyphicon-plus%22%3E%3C%2Fspan%3E+%3C%2Fbutton%3E+%3Cbutton+type%3D%22button%22+class%3D%22btn+btn-danger+btn-xs%22+onclick%3D%22deleteRow()%22%3E+%3Cspan+class%3D%22glyphicon+glyphicon-minus%22%3E%3C%2Fspan%3E+%3C%2Fbutton%3E+%3C%2Ftd%3E+%3C%2Ftr%3E+%3Ctr%3E+%3Ctd%3E%D0%97%D0%B0%D0%B3%D0%BE%D0%BB%D0%BE%D0%B2%D0%BE%D0%BA%3C%2Ftd%3E+%3Ctd%3E+%3Cinput+type%3D%22text%22+name%3D%22title%22+class%3D%22form-control%22%3E+%3C%2Ftd%3E+%3Ctd%3E%3C%2Ftd%3E+%3C%2Ftr%3E+%3Ctr%3E+%3Ctd%3E%D0%94%D0%BE%D0%BB%D0%B6%D0%BD%D0%BE%D1%81%D1%82%D1%8C%3C%2Ftd%3E+%3Ctd%3E+%3C!--+%3Cdiv+class%3D%22input-append+date%22+id%3D%22dp3%22+data-date%3D%2212-02-2012%22+data-date-format%3D%22dd-mm-yyyy%22%3E+%3Cinput+class%3D%22span2%22+size%3D%2216%22+type%3D%22text%22+value%3D%2212-02-2012%22+readonly%3D%22%22%3E+%3Cspan+class%3D%22add-on%22%3E%3Ci+class%3D%22icon-calendar%22%3E%3C%2Fi%3E%3C%2Fspan%3E+%3C%2Fdiv%3E+%3Cscript%3E+%24(%27%23dp3%27).datepicker()+%3C%2Fscript%3E--%3E+%3Cscript+type%3D%22text%2Fjavascript%22%3E+%24(function()+%7B+%24(+%22%23datepicker%22+).datepicker()%3B+%7D)%3B+%3C%2Fscript%3E+%3Cinput+type%3D%22text%22+id%3D%22datepicker%22+name%3D%22date%22%2F%3E+%3C%2Ftd%3E+%3Ctd%3E%3C%2Ftd%3E+%3C%2Ftr%3E+%3Ctr%3E+%3Ctd%3E%D0%9F%D1%80%D0%B8%D0%BE%D1%80%D0%B8%D1%82%D0%B5%D1%82%3C%2Ftd%3E+%3Ctd%3E+%3Cselect+class%3D%22form-control%22%3E+%3Coption%3E%D0%9D%D0%BE%D1%80%D0%BC%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9%3C%2Foption%3E+%3Coption%3E%D0%A1%D1%80%D0%BE%D1%87%D0%BD%D0%BE%3C%2Foption%3E+%3Coption%3E%D0%96%D0%B4%D0%B5%D1%82%3C%2Foption%3E+%3C%2Fselect%3E+%3C%2Ftd%3E+%3Ctd%3E%3C%2Ftd%3E+%3C%2Ftr%3E+%3Ctr%3E+%3Ctd+style%3D%22vertical-align%3A+top%3B%22%3E%D0%A1%D0%BE%D0%B4%D0%B5%D1%80%D0%B6%D0%B0%D0%BD%D0%B8%D0%B5%3C%2Ftd%3E+%3Ctd%3E+%3Ctextarea+id%3D%22msgBlog%22+name%3D%22msgBlog%22+style%3D%22display%3A+none%22%3E%3C%2Ftextarea%3E+%3Cdiv+id%3D%22txt_editor%22+style%3D%22margin-bottom%3A+17px%3B%22%3E%3C%2Fdiv%3E+%3Cscript%3E+CKEDITOR.appendTo(%27txt_editor%27%2C+null%2C+%27%27+)%3B+%3C%2Fscript%3E+%3C%2Ftd%3E+%3Ctd%3E%3C%2Ftd%3E+%3C%2Ftr%3E+%3C%2Ftable%3E+%3C!--+%D0%9F%D0%BE%D0%BB%D0%B5+MAX_FILE_SIZE+%D0%B4%D0%BE%D0%BB%D0%B6%D0%BD%D0%BE+%D0%B1%D1%8B%D1%82%D1%8C+%D1%83%D0%BA%D0%B0%D0%B7%D0%B0%D0%BD%D0%BE+%D0%B4%D0%BE+%D0%BF%D0%BE%D0%BB%D1%8F+%D0%B7%D0%B0%D0%B3%D1%80%D1%83%D0%B7%D0%BA%D0%B8+%D1%84%D0%B0%D0%B9%D0%BB%D0%B0+--%3E+%3Cinput+type%3D%22hidden%22+name%3D%22MAX_FILE_SIZE%22+value%3D%2220971520%22+%2F%3E+%3C!--+%D0%9D%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5+%D1%8D%D0%BB%D0%B5%D0%BC%D0%B5%D0%BD%D1%82%D0%B0+input+%D0%BE%D0%BF%D1%80%D0%B5%D0%B4%D0%B5%D0%BB%D1%8F%D0%B5%D1%82+%D0%B8%D0%BC%D1%8F+%D0%B2+%D0%BC%D0%B0%D1%81%D1%81%D0%B8%D0%B2%D0%B5+%24_FILES+--%3E+%3Cinput+name%3D%22userfile%22+type%3D%22file%22+style%3D%22width%3A+100%25%3B+text-align%3A+left%3B%22+class%3D%22btn+btn-default%22%2F%3E+%3C%2Fdiv%3E+%3C%2Fdiv%3E+%3Cdiv+class%3D%22panel-footer%22+style%3D%22text-align%3A+right%3B%22%3E+%3Cbutton+type%3D%22submit%22+class%3D%22btn+btn-primary%22%3E+%3Cspan+class%3D%22glyphicon+glyphicon-bullhorn%22%3E%3C%2Fspan%3E+%D0%9E%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%B8%D1%82%D1%8C+%3C%2Fbutton%3E+%3C%2Fdiv%3E+%3C%2Fdiv%3E+%3C%2Fform%3E+%3C%2Fdiv%3E&btnG=&oq=&gs_l=&pbx=1 -->
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
    <link rel="shortcut icon" href="/public/images/error.png" type="image/png">
    <title><?= $lang->findByKey('error') ?></title>
    <style>
        * {
            margin: 0;
            padding: 0
        }

        html, code {
            font: 15px/22px arial, sans-serif
        }

        html {
            background: #fff;
            color: #222;
            padding: 15px
        }

        body {
            margin: 7% auto 0;
            max-width: 390px;
            min-height: 180px;
            padding: 30px 0 15px
        }

        * > body {
            background: url(/public/images/error.jpg) 100% 5px no-repeat;
            /*background:url(/images/robot.png) 100% 5px no-repeat;*/
            padding-right: 205px
        }

        p {
            margin: 11px 0 22px;
            overflow: hidden
        }

        ins {
            color: #777;
            text-decoration: none
        }

        a img {
            border: 0
        }

    </style>
</head>
<body>
<p>
    <ins><?= $lang->findByKey('E500'); ?></ins>
</p>
</body>
</html>