<?php
class Pager
{
    // 現在のページ番号をセット
    private int $page_num;
    // 1ページあたりの表示件数
    private int $line;
    // 表示対象の全データ(配列)
    private array $data_array;

    public function __construct(array $data_array, int $line, int $page_num)
    {
        $this->page_num = $page_num;
        $this->line = $line;
        $this->data_array = $data_array;
    }

    /**
     * @return
     * 対象のページに表示するデータを配列で戻す
     */
    public function get_data()
    {
    }
    /**
     * @param array
     * class設定用の値を格納
     *
     * @param string
     * ページャをクリックした差異のリンク先URL
     *
     * @return string
     * ページャを表示
     */
}

// test data
$link = mysqli_connect('localhost', 'root', '', 'ph23_sample');
mysqli_set_charset($link, 'utf8');

$result = mysqli_query($link, "SELECT * FROM check_bmi;");
echo '$result:';
var_dump($result);
echo '<br>';
// peger設定
// $pageSettings = new Pager($_GET['pagenum'], 5,)

?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php ?>
    <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="index.php?page_num=0">前へ</a></li>
        <li class="page-item active"><a class="page-link" href="index.php?page_num=1">1</a></li>
        <li class="page-item"><a class="page-link" href="index.php?page_num=2">2</a></li>
        <li class="page-item"><a class="page-link" href="index.php?page_num=2">次へ</a></li>
    </ul>
</body>

</html>