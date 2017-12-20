<?php

/**
 * The reCaptcha Block
 *
 * @category   ProxiBlue
 * @package    ProxiBlue_reCaptcha
 * @author     Lucas van Staden (sales@proxiblue.com.au)
 */
class ProxiBlue_ReCaptcha_Block_Captcha_Recaptcha extends Mage_Captcha_Block_Captcha_Zend {

	protected $_template = 'captcha/recaptcha.phtml';

    public function canRenderJs()
    {
        if (!Mage::registry('recaptcha_rendered')) {
            Mage::register('recaptcha_rendered', true, true);
            return true;
        }
        return false;
    }

    /**
     * Gets the full Recaptcha JavaScript URL
     *
     * @param array $params  Extra parameters to pass to the URL
     * @return string
     */
    public function getRecaptchaJsUrl(array $params = [])
    {
        $language = $this->helper('proxiblue_recaptcha')->getConfigNode('language');
        $params['render'] = 'explicit';
        if ($language) {
            $params['hl'] = $language;
        }
        return ProxiBlue_ReCaptcha_Helper_Data::RECAPTCHA_BASE_URL . '?' . http_build_query($params);
    }

}
