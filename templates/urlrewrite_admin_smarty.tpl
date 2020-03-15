<{strip}>
    <fieldset>
        <legend>
            Enable URL rewrite in Smarty (Use the code below after $xoopsTpl initialization)
        </legend>
        require_once XOOPS_ROOT_PATH."/modules/urlrewrite/include/smarty.php";
    </fieldset>
    <fieldset>
        <legend>
            Smarty Rewrite Sample
        </legend>
        <{if 0 < count($urls)}>
            <table style="width: 100%;">
                <{foreach from=$urls item="url"}>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            <{$url->get_primary_key()}>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Pattern
                        </th>
                        <td class="<{cycle values='odd,even'}>">
                            <a href="<{$xoops_url}>/<{$url->get_pattern()}>" target="_blank">
                                <{$url->get_pattern()}>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Target URL
                        </th>
                        <td class="<{cycle values='odd,even'}>">
                            <a href="<{$xoops_url}>/<{$url->get_target_url()}>" target="_blank">
                                <{$url->get_target_url()}>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Smarty Sample
                        </th>
                        <td class="<{cycle values='odd,even'}>">
                            <{ldelim}>"<{$xoops_url}>/<{$url->get_target_url()}>"|smarty_urlrewrite<{rdelim}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Smarty Result
                        </th>
                        <td class="<{cycle values='odd,even'}>">
                            <{$xoops_url|cat:"/"|cat:$url->get_target_url()|smarty_urlrewrite|escape}>
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        <{/if}>
    </fieldset>
<{/strip}>
