<?php

/**
 * Campaign.
 * 
 * Campaign Labels Pivot Model.
 * 
 * @author Gemblue
 */

namespace app\models;

use yii\db\ActiveRecord;

class CampaignLabels extends ActiveRecord
{
    /**
     * Define table name.
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'campaign_labels';
    }

    /**
     * Save and connect
     * 
     * @return void
     */
    public function saveConnect($campaignId, $labels) {

        $labelsModel = new Labels;
        $labelsId = null;
        
        /** Separate with comma. */
        $results = explode(', ', $labels);

        /** Create label master */
        foreach ($results as $result) {
            
            $row = $labelsModel::find()->where(['label_name' => $result])->one();

            if (!$row) {

                $labelsModel->label_name = $result;
                $labelsModel->save();

                $labelsId = $labelsModel->id;
            } else {
                $labelsId = $row->id;
            }

            /** Connect label with campaign */
            $relations = $this->find()->where(['labels_id' => $labelsId, 'campaign_id' => $campaignId])->one();
            
            if (!$relations) {

                $this->labels_id = $labelsId;
                $this->campaign_id = $campaignId;
                
                $this->save();
            
            }
        }    
    }
}