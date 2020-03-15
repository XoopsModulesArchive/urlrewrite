<{strip}>
    <form name="<{$edit_form.name}>" action="<{$edit_form.action}>" method="<{$edit_form.method}>" <{$edit_form.extra}> >
        <{$edit_form.javascript}>
        <{$edit_form.elements.id.body}>
        <table style="width: 100%;">
            <tr>
                <th>
                    ID
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$id}>
                </td>
            </tr>
            <tr>
                <th>
                    Pattern
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$edit_form.elements.pattern.body}>
                </td>
            </tr>
            <tr>
                <th>
                    Target URL
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$edit_form.elements.target_url.body}>
                </td>
            </tr>
            <tr>
                <th>
                    Enabled
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$edit_form.elements.enabled.body}>
                </td>
            </tr>
            <tr>
                <th>
                </th>
                <td class="<{cycle values='even,odd'}>">
                    <{$edit_form.elements.submit.body}>
                </td>
            </tr>
        </table>
    </form>
<{/strip}>
