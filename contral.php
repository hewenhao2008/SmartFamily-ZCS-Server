灯光亮度设置：
<form action="http://wcc.hxlxz.com/set.php" method="post">
    <select name="set" size="1">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected>3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
    </select>
    <input type="hidden" name="name" value="L.V">
    <input type="hidden" name="password" value="<?php echo $_REQUEST['password'];?>">
    <input type="submit" value="确定">
</form>   
插座A：
<form action="http://wcc.hxlxz.com/set.php" method="post" >
    <input type="radio" name="set" value="1" checked>开
    <input type="radio" name="set" value="0">关
    <input type="hidden" name="name" value="C.S1">
    <input type="hidden" name="password" value="<?php echo $_REQUEST['password'];?>">
    <input type="submit" value="确定">
</form>
插座B：
<form action="http://wcc.hxlxz.com/set.php" method="post">
    <input type="radio" name="set" value="1" checked>开
    <input type="radio" name="set" value="0">关
    <input type="hidden" name="name" value="C.S2">
    <input type="hidden" name="password" value="<?php echo $_REQUEST['password'];?>">
    <input type="submit" value="确定">
</form>