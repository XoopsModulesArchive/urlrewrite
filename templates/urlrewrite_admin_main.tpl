<{strip}>
    <table style="width: 100%;">
        <tr>
            <th>ID</th>
            <th>Pattern</th>
            <th>Target URL</th>
            <th>Enabled</th>
            <th><{$smarty.const._EDIT}></th>
            <th><{$smarty.const._DELETE}></th>
        </tr>
        <{foreach from=$urls item="url"}>
            <tr class="<{cycle values='even,odd'}>">
                <td><{$url->get_primary_key()}></td>
                <td><a href="<{$xoops_url}>/<{$url->get_pattern()}>" target="_blank"><{$url->get_pattern()}></a></td>
                <td><a href="<{$xoops_url}>/<{$url->get_target_url()}>" target="_blank"><{$url->get_target_url()}></a></td>
                <td><{if true === $url->get_enabled()}><{$smarty.const._YES}>
                    <{else}>
                        <{$smarty.const._NO}>
                    <{/if}>
                </td>
                <td><a href="<{$xoops_url}>/modules/urlrewrite/admin/edit.php?id=<{$url->get_primary_key()}>"><{$smarty.const._EDIT}></a></td>
                <td><a href="<{$xoops_url}>/modules/urlrewrite/admin/delete.php?id=<{$url->get_primary_key()}>"><{$smarty.const._DELETE}></a></td>
            </tr>
        <{/foreach}>
    </table>
<{/strip}>
