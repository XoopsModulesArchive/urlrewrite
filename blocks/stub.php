<?php

defined('XOOPS_ROOT_PATH') || exit('Restricted access');
/**
 * @return array|bool
 */
function b_urlrewrite_stub()
{
    $stubhandler = $helper->getHandler('Stub');
    /* @var StubHandler $stubhandler */
    if (true === $stubhandler->get_in_xoops()) {
        $block                = [];
        $block['script_url']  = $stubhandler->get_script_url();
        $block['is_redirect'] = $stubhandler->get_is_redirect();
        $block['patterns']    = $stubhandler->get_patterns();
        $block['target_urls'] = $stubhandler->get_target_urls();

        return $block;
    }

    return false;
}
