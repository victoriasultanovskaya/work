<?php

class SiteController extends Controller
{
	/**
	 * Declares the behaviors.
	 * @return array the behaviors
	 */
	public function behaviors()
	{
		return array(
			'seo'=>'ext.seo.components.SeoControllerBehavior',
		);
	}

	/**
	 * Declares class-based actions.
	 * @return array the actions
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		$this->render('index', array());
	}

	public function actionSetup()
	{
		$parser = new CMarkdownParser();
		Yii::app()->clientScript->registerCss('TextHighligther', file_get_contents($parser->getDefaultCssFile()));

		$this->render('setup', array(
			'parser'=>$parser,
		));
	}

	public function actionMaintenance()
	{
		$this->layout = '/layouts/maintenance';
		$this->render('maintenance');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

    public function getTabularFormTabs($form, $model)
    {
        $tabs = array();
        $count = 0;

        foreach (array('en'=>'English', 'fi'=>'Finnish', 'sv'=>'Swedish') as $locale => $language)
        {
            $tabs[] = array(
                'active'=>$count++ === 0,
                'label'=>$language,
                'content'=>$this->renderPartial('_tabular', array(
                    'form'=>$form,
                    'model'=>$model,
                    'locale'=>$locale,
                    'language'=>$language,
                ), true),
            );
        }

        return $tabs;
    }
}
