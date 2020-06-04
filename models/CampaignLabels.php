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
     * Get label
     * 
     * Get detail label from pivot point of view.
     */
    public function getLabel()
    {
        return $this->hasOne(Labels::className(), ['id' => 'labels_id']);
    }

    /**
     * Save and connect
     * 
     * @return void
     */
    public function saveConnect($campaignId, $labels) {

        /** Local */
        $labelsId = null;
        $labelsModel = new Labels;

        /** Decode. */
        $results = json_decode($labels, TRUE);
        
        /** Create label master */
        foreach ($results as $result) {

            $row = $labelsModel::find()->where(['label_name' => $result['value']])->one();

            if (!$row) {

                $labelsModel = new Labels;
                $labelsModel->label_name = $result['value'];
                $labelsModel->save();
                
                $labelsId = $labelsModel->id;
            } else {
                $labelsId = $row->id;
            }

            /** Connect label with campaign */
            $relations = CampaignLabels::find()->where(['labels_id' => $labelsId, 'campaign_id' => $campaignId])->exists();
            
            if (!$relations) {
                
                $seed = new CampaignLabels;

                $seed->labels_id = $labelsId;
                $seed->campaign_id = $campaignId;
                
                $seed->save();
            
            }
        }   
    }
}