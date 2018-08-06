<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/5
 * Time: 11:53
 */

namespace page;

use think\Paginator;

/**
 * 此分页是Materialize的分页  其代码如下
 * <ul class="pagination">
 * <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
 * <li class="active"><a href="#!">1</a></li>
 * <li class="waves-effect"><a href="#!">2</a></li>
 * <li class="waves-effect"><a href="#!">3</a></li>
 * <li class="waves-effect"><a href="#!">4</a></li>
 * <li class="waves-effect"><a href="#!">5</a></li>
 * <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
 * </ul>
 * Class Page
 * @package page
 */
class Page extends Paginator
{

    //上一页
    protected function prev()
    {
        if ($this->currentPage() > 1) {
            return '<li><a href="' . $this->url($this->currentPage - 1) . '"><i class="material-icons">chevron_left</i></a></li>';
        } else {
            return '<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>';
        }
    }

    //下一页
    protected function next()
    {
        if ($this->hasMore) {
            return '<li><a href="' . $this->url($this->currentPage + 1) . '"><i class="material-icons">chevron_right</i></a></li>';
        } else {
            return '<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>';
        }
    }

    /**
     * 页码按钮
     * @return string
     */
    protected function getLinks()
    {
        $html = "";
        for ($i = 1; $i <= $this->lastPage(); $i++) {
            if ($i == $this->currentPage()) {
                $html .= $this->getActivePageWrapper($i);
            } else {
                $html .= $this->getAvailablePageWrapper($this->url($i), $i);
            }
        }
        return $html;
    }

    /**
     * 渲染分页html
     * @return mixed
     */
    public function render()
    {
        if ($this->hasPages()) {
            return sprintf(
                '<ul class="pagination right-align">%s %s %s</ul>',
                $this->prev(),
                $this->getLinks(),
                $this->next()
            );
        }
    }

    /**
     * 生成一个可点击的按钮
     *<li class="waves-effect"><a href="#!">2</a></li>
     * @param  string $url
     * @param  int $page
     * @return string
     */
    protected function getAvailablePageWrapper($url, $page)
    {
        return '<li class="waves-effect"><a href="' . htmlentities($url) . '" title="第"' . $page . '"页" >' . $page . '</a></li>';
    }

    /**
     * 生成一个激活的按钮
     *
     * @param  string $text
     * @return string
     */
    protected function getActivePageWrapper($text)
    {
        return '<li class="active"><a href="#!">' . $text . '</a></li>';
    }

    /**
     * 批量生成页码按钮.
     *
     * @param  array $urls
     * @return string
     */
    protected function getUrlLinks(array $urls)
    {
        $html = '';
        foreach ($urls as $page => $url) {
            $html .= $this->getPageLinkWrapper($url, $page);
        }
        return $html;
    }

    /**
     * 生成普通页码按钮
     *
     * @param  string $url
     * @param  int $page
     * @return string
     */
    protected function getPageLinkWrapper($url, $page)
    {
        if ($page == $this->currentPage()) {
            return $this->getActivePageWrapper($page);
        }
        return $this->getAvailablePageWrapper($url, $page);
    }

}