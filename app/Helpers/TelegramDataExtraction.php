<?php

namespace App\Helpers;

use App\Models\MasterTelegram\MsgAction;
use App\Models\MasterTelegram\MsgData;
use App\Models\MasterTelegram\MsgFile;
use App\Models\MasterTelegram\MsgInstance;
use App\Models\MasterTelegram\MsgMember;
use App\Models\MasterTelegram\MsgPhoto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TelegramDataExtraction{

    public $data;

    public $msg_instance_id;

    public $msg_action_id;

    public $msg_data_id;

    public $photo_id;

    public $msg_file_id;

    public $member_id;

    public function __construct( $data )
    {

        $this->data = $data;

        //  CREATE IDS
        $this->createIds();

        $this->extractAndCreate();

    }

    /**
     * CREATE UNIQUE IDS
     */
    public function createIds(){

        $this->msg_instance_id = $this->data['id'];

        //  ---------   IF MEMBER
        if( isset($this->data['member']) ){
            $this->member_id = $this->data['member']['id'];
        }

        //  ----------  IF ACTION
        if( isset($this->data['action']) ){
            $this->msg_action_id = $this->data['action']['id'];
        }

        $this->msg_action_id = Str::uuid()->toString();

        $this->msg_data_id = Str::uuid()->toString();

        $this->photo_id = Str::uuid()->toString();

        $this->msg_file_id = Str::uuid()->toString();

    }

    /**
     * EXTRACT AND CREATE
     */
    public function extractAndCreate(){

        DB::transaction(function() {

            MsgInstance::updateOrCreate([
                'msg_instance_id' => $this->msg_instance_id
            ],[
                'type'            => $this->data['type'],
                'msg_action_id'   => $this->msg_action_id,
                'msg_data_id'     => $this->msg_data_id,
                'msg_member_id'   => $this->member_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            //  --------------- IF ACTION IS action
            if( isset($this->data['action']) ){

                MsgAction::create([
                    'msg_action_id' =>  $this->msg_action_id,
                    'name'          =>  $this->data['action']['name'],
                    'description'   =>  $this->data['action']['description']
                ]);

            }

            //  ---------   IF MEMBER
            if( isset($this->data['member']) ){

                MsgMember::updateOrCreate([
                    'msg_member_id' => $this->member_id
                ],[
                    'member_tg_id'  => $this->data['member']['member_tg_id'],
                    'first_name'    => $this->data['member']['first_name'],
                    'last_name'     => $this->data['member']['last_name'],
                    'cell'          => $this->data['member']['cell'],
                    'email'         => $this->data['member']['email'],
                    'physical_address' => $this->data['member']['physical_address'],
                    'postal_address' => $this->data['member']['postal_address'],
                    'id_number' => $this->data['member']['id_number'],
                    'passport_number' => $this->data['member']['passport_number'],
                    'system_added' => $this->data['member']['system_added'],
                    'banned' => $this->data['member']['banned'],
                    'created_at' => $this->data['member']['created_at'],
                    'updated_at' => $this->data['member']['updated_at'],

                ]);

            }

            //  -----------   IF DATA
            if( isset($this->data['data']) ){

                MsgData::create([
                    'msg_data_id'   =>  $this->msg_data_id,
                    'size'          =>  $this->data['data']['size'],
                    'photo_id'      =>  $this->photo_id,
                    'no_bays'       =>  $this->data['data']['no_bays'],
                    'location'       =>  $this->data['data']['location'],
                    'no_staff'       =>  $this->data['data']['no_staff'],
                    'services'       =>  $this->data['data']['services'],
                    'work_req'       =>  $this->data['data']['work_req'],
                    'condition'       =>  $this->data['data']['condition'],
                    'ownership'       =>  $this->data['data']['ownership'],
                    'namefacility'    =>  $this->data['data']['namefacility'],
                    'servicesprov'    =>  $this->data['data']['servicesprov'],
                    'typefacility'    =>  $this->data['data']['typefacility'],
                ]);

                //  ------------    CHECK IF PHOTOS
                if( isset($this->data['data']['photo']) ){

                    //  ------------    ADD PHOTO
                    foreach( $this->data['data']['photo'] as $photo){

                        MsgPhoto::create([
                            'msg_photo_id' => Str::uuid()->toString(),
                            'photo_id'     => $this->photo_id,
                            'for'          => $photo['for'],
                            'msg_member_id' => $this->member_id,
                            'mime_type' => $photo['mime_type']
                        ]);

                        if($photo['telegram_file']){

                            MsgFile::create([
                                'msg_file_id'  =>   $this->msg_file_id,
                                'file_id'      =>   $photo['telegram_file']['file_id'],
                                'file_url'      =>   $photo['telegram_file']['file_url'],
                                'file_path'      =>   $photo['telegram_file']['file_path'],
                                'file_size'      =>   $photo['telegram_file']['file_size'],
                                'file_unique_id' =>   $photo['telegram_file']['file_unique_id'],
                            ]);

                        }

                    }

                }

            }

        });

    }

}