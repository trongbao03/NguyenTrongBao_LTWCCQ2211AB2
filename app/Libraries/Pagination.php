<?php

namespace App\Libraries;

class Pagination
{
    public static function pageLink($total, $current, $limit, $url = '')
    {
        if ($total == 0)
            return '';
        $numPage = ceil($total / $limit);
        if ($total % $limit != 0)
            $numPage++;

        $html = '<ul class="pagination justify-content-center">';

        if ($numPage == 1)
            return $html;

        if ($current > 1) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=1">Trang đầu</a></li>';
            $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=' . ($current - 1) . '">Trang trước</a></li>';
        }

        if ($current <= 3) {
            for ($i = 1; $i < 5 && $i <= $numPage; $i++) {
                if ($i == $current) {
                    $html .= '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=' . $i . '">' . $i . '</a></li>';
                }
            }
        } else if ($numPage - $current <= 2) {
            for ($i = $current - 2; $i < $current + 2 && $i <= $numPage; $i++) {
                if ($i == $current) {
                    $html .= '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=' . $i . '">' . $i . '</a></li>';
                }
            }
        } else {
            for ($i = $current - 2; $i < $numPage; $i++) {
                if ($i == $current) {
                    $html .= '<li class="page-item"><a class="page-link">' . $i . '</a></li>';
                } else {
                    $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=' . $i . '">' . $i . '</a></li>';
                }
            }
        }

        if ($current < $numPage) {
            $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=' . ($current + 1) . '">Trang sau</a></li>';
            $html .= '<li class="page-item"><a class="page-link" href="' . $url . 'page=' . $numPage . '">Trang cuối</a></li>';
        }

        $html .= '</ul>';

        return $html;
    }

    public static function pageCurrent()
    {
        $page = (isset($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $page = (is_numeric($page)) ? $page : 1;
        $page = ($page <= 0) ? 1 : $page;
        return $page;
    }
    public static function pageOffset($current, $limit)
    {
        return ($current - 1) * $limit;
    }
}
