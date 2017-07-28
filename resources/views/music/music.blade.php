@extends('layouts.app   ')

@section('content')
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js">
    </script>
    <style type="text/css">

        .quiet{
            font-family: 'Lato';
        }

        .cool{
            font-family: 'Lato';
        }
        #panel1,#flip1,#panel2,#flip2,#panel3,#flip3,#panel4,#flip4,#panel5,#flip5,#panel6,#flip6,#panel7,#flip7,#panel8,#flip8,#panel9,#flip9,#panel10,#flip10,#panel11,#flip11,#panel12,#flip12
        {
            text-align:center;
            padding:5px;
            width:400px;

            background-color:#e5eecc;
            border:solid 1px #c3c3c3;
        }
        #panel1,#panel2,#panel3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9,#panel10,#panel11,#panel12
        {   height:100px;
            padding:5px;
            display:none;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#flip1").click(function(){
                $("#panel1").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip2").click(function(){
                $("#panel2").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip3").click(function(){
                $("#panel3").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip4").click(function(){
                $("#panel4").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip5").click(function(){
                $("#panel5").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip6").click(function(){
                $("#panel6").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip7").click(function(){
                $("#panel7").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip8").click(function(){
                $("#panel8").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip9").click(function(){
                $("#panel9").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip10").click(function(){
                $("#panel10").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip11").click(function(){
                $("#panel11").slideToggle("slow");
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#flip12").click(function(){
                $("#panel12").slideToggle("slow");
            });
        });
    </script>

    <div class="col-sm-8 col-sm-offset-2">
        <table class="table">
            <tr>
                <td style="background-color:blue; color:whitesmoke;" width="400px">
                    <center style="font-size: medium"><span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;Listen quietly</center>
                </td>
                <td style="background-color:mediumvioletred; color:whitesmoke;">
                    <center style="font-size: medium"><span class="glyphicon glyphicon-fire"></span>&nbsp;&nbsp;Listen with cool</center>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="flip1" class="quiet">小幸运 -- 费玉清</div>
                    <div id="panel1">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=441489800&auto=0&height=66"></iframe>
                    </div>
                </td>
                <td>
                    <div id="flip2" class="cool">I hated myself for loving you</div>
                    <div id="panel2">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=4132379&auto=0&height=66"></iframe>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div id="flip3" class="quiet">我最亲爱的 -- 苏打绿</div>
                    <div id="panel3">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=26075399&auto=0&height=66"></iframe>
                    </div>
                </td>
                <td>
                    <div id="flip4" class="cool">See the Loco -- Blue Eyelids</div>
                    <div id="panel4">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=426852746&auto=0&height=66"></iframe>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div id="flip5" class="quiet">在雨中 -- 韩寒/亭东小伙伴</div>
                    <div id="panel5">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=453268744&auto=0&height=66"></iframe>
                    </div>
                </td>
                <td>
                    <div id="flip6" class="cool">梦灯笼(R7CKY MIX) -- R7CKY</div>
                    <div id="panel6">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=446935665&auto=0&height=66"></iframe>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div id="flip7" class="quiet">水星记 -- 郭顶</div>
                    <div id="panel7">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=441491828&auto=0&height=66"></iframe>
                    </div>
                </td>
                <td>
                    <div id="flip8" class="cool">Fashion -- The Royal Concept</div>
                    <div id="panel8">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=34144578&auto=0&height=66"></iframe>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div id="flip9" class="quiet">可乐 -- 赵浴辰</div>
                    <div id="panel9">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=29759733&auto=0&height=66"></iframe>
                    </div>
                </td>
                <td>
                    <div id="flip10" class="cool">A Higher Place -- Adam Levine</div>
                    <div id="panel10">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=28747429&auto=0&height=66"></iframe>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div id="flip11" class="quiet">花事了 -- 王菲</div>
                    <div id="panel11">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=299281&auto=0&height=66"></iframe>
                    </div>
                </td>
                <td>
                    <div id="flip12" class="cool">Free Loop -- Daniel Powter</div>
                    <div id="panel12">
                        <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=5253801&auto=0&height=66"></iframe>
                        </embed>
                    </div>
                </td>
            </tr>


        </table>

        <center><footer style="background-color:coral;color:pink; height:35px; font-size:20px; margin-top: 70px;">@感谢&nbsp;<a style="color:whitesmoke"href="http://music.163.com/">网易云音乐</a>&nbsp;&nbsp;提供音乐资源</footer></center>
    </div>
@stop