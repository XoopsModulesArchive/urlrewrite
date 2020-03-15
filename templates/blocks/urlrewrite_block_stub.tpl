<{strip}>
    <{if true === $block.is_redirect}>
        <{if array() === $block.patterns}>
            This page is redirect from "<{$smarty.server.REDIRECT_URL}>" to "<{$smarty.server.SCRIPT_NAME}>".
        <{else}>
            <table>
                <tr>
                    <th>
                        This page is redirect to
                    </th>
                    <th>
                        Enabled
                    </th>
                </tr>
                <{foreach from=$block.patterns item="pattern"}>
                    <tr class="<{cycle values='odd,even'}>">
                        <td>
                            <a href="<{$xoops_url}>/modules/urlrewrite/admin/edit.php?id=<{$pattern->get_primary_key()}>" target="_blank">
                                <{$pattern->get_target_url()}>
                            </a>
                        </td>
                        <td>
                            <{if true === $pattern->get_enabled()}>
                                <{$smarty.const._YES}>
                            <{else}>
                                <{$smarty.const._NO}>
                            <{/if}>
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        <{/if}>
    <{else}>
        <{if array() === $block.target_urls}>
        <{else}>
            <table>
                <tr>
                    <th>
                        This page is able to redirect from
                    </th>
                    <th>
                        Enabled
                    </th>
                </tr>
                <{foreach from=$block.target_urls item="target_url"}>
                    <tr class="<{cycle values='odd,even'}>">
                        <td>
                            <a href="<{$xoops_url}>/modules/urlrewrite/admin/edit.php?id=<{$target_url->get_primary_key()}>" target="_blank">
                                <{$target_url->get_pattern()}>
                            </a>
                        </td>
                        <td>
                            <{if true === $target_url->get_enabled()}>
                                <{$smarty.const._YES}>
                            <{else}>
                                <{$smarty.const._NO}>
                            <{/if}>
                        </td>
                    </tr>
                <{/foreach}>
            </table>
        <{/if}>
    <{/if}>
    <{if "" !== $block.script_url}>
        <a href="<{$xoops_url}>/modules/urlrewrite/admin/createurl.php?script_url=<{$block.script_url}>" target="_blank">
            Create redirect to "<{$block.script_url}>".
        </a>
    <{/if}>
<{/strip}>
