<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $NoiDung = array(
    		'Bài viết rất hay',
    		'Tôi rất thích bài viết này',
    		'Bài viết này tạm ổn',
    		'Hay quá trời',
    		'Tôi sẽ học thèo bài viết này',
    		'Bài viết này chưa được hay lắm',
    		'Bài viết này được',
    		'Không thích bài viết này',
    		'Tôi chưa có ý kiến gì',
    		'like',
    		'unlike'

    	);
    	for( $i=0;$i<100;$i++)
    	{
    		DB::table('comments')->insert(
	    		[
	    			'idUser'=>rand(1,10),
	    			'idTinTuc'=>rand(19,24),
	    			'NoiDung'=> $NoiDung[rand(0,10)],
	    			'created_at' => new DateTime()

	    		]
    	    );

    	}
    }
}
