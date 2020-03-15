<{strip}>
    <form name="<{$create_form.name}>" action="<{$create_form.action}>" method="<{$create_form.method}>" <{$create_form.extra}> >
        <{$create_form.javascript}>
        <table style="width: 100%;">
            <tr>
                <th>
                    Pattern
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$create_form.elements.pattern.body}>
                </td>
            </tr>
            <tr>
                <th>
                    Target URL
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$create_form.elements.target_url.body}>
                </td>
            </tr>
            <tr>
                <th>
                    Enabled
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$create_form.elements.enabled.body}>
                </td>
            </tr>
            <tr>
                <th>
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$create_form.elements.submit.body}>
                </td>
            </tr>
        </table>
    </form>
<{/strip}>
