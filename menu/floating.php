<style>
/* 떠다니는 메뉴 (Floating Menu) */
#floatdiv {
    position:fixed; _position:absolute; _z-index:-1;
    width:160px; /* 가로폭 조절*/
    overflow:hidden;
    right:45%;
    top:24%; /* 이미지 높이 조절 */
    background-color: transparent;
    margin-right: -560px; /* 좌우측 여백 조절 */
    padding:0;
}#floatdiv ul  { list-style: none; }
#floatdiv li  { margin-bottom: 2px; text-align: center; }
#floatdiv a   { color: #5D5D5D; border: 0; text-decoration: none; display: block; }
#floatdiv a:hover, #floatdiv .menu  { background-color: #5D5D5D; color: #fff; }
#floatdiv .menu, #floatdiv .last    { margin-bottom: 0px; }
</style>
<div id="floatdiv">
<ul>
<a href='#' target='_blank'><img src='이미지주소' /></a>
<a href='#' target='_blank'><img src='이미지주소' /></a>
<a href='#' target='_blank'><img src='이미지주소' /></a>
<a href='#' target='_blank'><img src='이미지주소' /></a>
<a href='#' target='_blank'><img src='이미지주소' /></a>
</ul>
</div>