<?php
    session_start(); 
    include "lib.php";
    include "css/style.css";

    $user_id = $_SESSION['isLoginId'];
    $user_id = mysqli_real_escape_string($connect, $user_id);

    $query = " select * from member where user_id='$user_id' "; 
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    $user_name = $data['name'];
?>


    <!-- Navigation-->
    <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">

            <li class="sidebar-brand"><a href="#">MENU</a></li>
            <li class="sidebar-nav-item"><a href="../login/join.php">Create Account</a></li>
            <li class="sidebar-nav-item"><a href="../login/login.php">Login</a></li>
            <li class="sidebar-nav-item"><a href="../index.html">Home</a></li>
            <li class="sidebar-nav-item"><a href="../index.html">Main test</a></li>
            <li class="sidebar-nav-item"><a href="list.php">Community</a></li>

        </ul>
    </nav>


    <div class="board_wrap">
        <div class="board_title">
            <strong>마이페이지</strong>
            <p>본인이 작성한 게시물을 확인할 수 있습니다.</p>
        </div>
        <div class="board_info_wrap">
            <div class="top">
                <div class="name"> 이름 <li><?=$data['name']?></li> </div>
            </div>
            <div class="body">
                <div class="idx"> 회원 번호 <li><?=$data['idx']?></li> </div>
                <div class="user_id"> 아이디 <li><?=$data['user_id']?></li> </div>
                <div class="email"> 이메일 <li><?=$data['email']?></li> </div>
                <div class="regdate"> 가입 날짜 <li><?=substr($data['regdate'],0,10)?></li> </div>
            </div>
        </div>

        <div class="board_list_wrap">
            <div class="board_list">
                <div class="top">
                    <div class="num">번호</div>
                    <div class="title">제목</div>
                    <div class="writer">글쓴이</div>
                    <div class="date">작성일</div>
                </div>

<?php
    $query = "select * from list order by idx desc ";
    $result = mysqli_query($connect, $query);

    while($data = mysqli_fetch_array($result)){
        if ($user_name == $data['name']) {
?>
        <div>
            <div class="num"> <?=$data['idx']?> </div>
            <div class="title"> <a href="view.php?idx=<?=$data['idx']?>"><?=$data['subject']?></a> </div>
            <div class="writer"> <?=$data['name']?> </div>
            <div class="date"> <?=substr($data['regdate'],0,10)?> </div>
        </div>
<?php }} ?>

<script src="js/scripts.js"></script>
</table>
        </div>
    </div>
</div>