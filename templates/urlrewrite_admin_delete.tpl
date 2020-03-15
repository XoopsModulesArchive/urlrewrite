<{strip}>
    <table style="width: 100%;">
        <tr>
            <th>
                ID
            </th>
            <td class="<{cycle values='even,odd'}>">
                <{$url->get_primary_key()}>
            </td>
        </tr>
        <tr>
            <th>
                Pattern
            </th>
            <td class="<{cycle values='even,odd'}>">
                <{$url->get_pattern()}>
            </td>
        </tr>
        <tr>
            <th>
                Target URL
            </th>
            <td class="<{cycle values='even,odd'}>">
                <{$url->get_target_url()}>
            </td>
        </tr>
        <tr>
            <th>
                Enabled
            </th>
            <td class="<{cycle values='even,odd'}>">
                <{if true === $url->get_enabled()}>
                    <{$smarty.const._YES}>
                <{else}>
                    <{$smarty.const._NO}>
                <{/if}>
            </td>
        </tr>
    </table>
<{/strip}>
