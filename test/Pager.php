<?php

declare(strict_types=1);
class Pager
{
    private int $page_num;
    private int $line;
    private array $data_array;

    /**
     * @param array $data_array 表示対象の全データ(配列)
     * @param int $line 1ページあたりの表示件数
     * @param int $page_num 現在のページ番号をセット 0以下はセット負荷
     */
    public function __construct(array $data_array, int $line, int $page_num)
    {
        $this->data_array = $data_array;
        $this->line = $line;
        $this->page_num = $page_num;
    }
    /**
     * @return array $return
     * 対象のページに表示するデータを配列で戻す
     */
    public function get_data(): array
    {
        $first_page = ($this->page_num - 1) * $this->line;
        $last_page = $this->line * $this->page_num - 1;
        for ($i = $first_page; $i <= $last_page; $i++) {
            $return[] = $this->data_array[$i];
        };
        return $return;
    }
    /**
     * @param array $class
     * class設定用の値を格納
     * 'ul' => 'pagination',
     * 'li' => ['main' => 'page-item', 'active' => 'active', 'disabled' => 'disabled'],
     *  'a' => 'page-link',
     * @param string $link
     * ページャをクリックした差異のリンク先URL
     * ページャを表示
     * <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
            <a class="page-link" href="$link?page_num=$this->page_num-1" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
            </li>
            @foreach($i = 0;$i<=$max_page;$i++)
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            @endforeach
            <li class="page-item">
            <a class="page-link" href="$link?page_num=$this->page_num+1" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
        </nav>
     */
    public function page_list(array $class = [], string $link = '')
    {
        /** 表示していく */
        echo '<ul class="' . $class['ul'] . '">';
        /** prev */
        // active || disabled
        echo '<li class="' . $class['li']['main'];
        echo ' ';
        echo $this->page_num === 1 ? $class['li']['disabled'] : '';
        echo '">';
        // prev link
        $prev = $this->page_num - 1;
        echo '<a class="' . $class['a'] . '" href="' . $link . '?page_num=' . $prev . '" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            </a>
            </li>';

        /** ページ数 */
        $max_page = count($this->data_array) / $this->line;
        for ($i = 1; $i <= $max_page; $i++) :
            echo '<li class="' . $class['li']['main'];
            echo ' ';
            echo $this->page_num === $i ? $class['li']['active'] : '';
            echo '">';
            echo '<a class="' . $class['a'];
            echo '" href="' . $link . '?page_num=' . $i . '">' . $i . '</a></li>';
        endfor;

        /** next */
        // active || disabled
        echo '<li class="' . $class['li']['main'];
        echo ' ';
        echo $this->page_num === $max_page ? $class['li']['disabled'] : '';
        echo '">';
        // next link
        $next = $this->page_num + 1;
        echo '<a class="' . $class['a'] . '" href="' . $link . '?page_num=' . $next . '" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            </a>
            </li>';
        // 終了
        echo '</ul>';
    }
}
