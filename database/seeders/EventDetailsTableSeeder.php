<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('event_details')->delete();

        \DB::table('event_details')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'اسم صاحب الاحتفال',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 1,
                'created_at' => '2024-04-13 07:20:28',
                'updated_at' => '2024-04-13 07:21:08',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'عمر صاحب الاحتفال',
                'type' => 'number',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 1,
                'created_at' => '2024-04-13 07:20:28',
                'updated_at' => '2024-04-13 07:21:08',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'الجنس',
                'type' => 'select',
                'options' => '[{"name":"\\u0630\\u0643\\u0631"},{"name":"\\u0623\\u0646\\u062b\\u0649"}]',
                'is_required' => 1,
                'event_id' => 1,
                'created_at' => '2024-04-13 07:20:28',
                'updated_at' => '2024-04-13 07:21:08',
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'الألوان المفضلة',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 1,
                'created_at' => '2024-04-13 07:20:28',
                'updated_at' => '2024-04-13 07:21:08',
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'الثيم',
                'type' => 'select',
                'options' => '[{"name":"\\u0647\\u0627\\u062f\\u0626"},{"name":"\\u0645\\u0641\\u0639\\u0645"},{"name":"\\u0641\\u062e\\u0645"}]',
                'is_required' => 1,
                'event_id' => 1,
                'created_at' => '2024-04-13 07:20:28',
                'updated_at' => '2024-04-13 07:21:08',
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'هل تريد/ تريدين إضاءة إضافية ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 1,
                'created_at' => '2024-04-13 07:20:28',
                'updated_at' => '2024-04-13 07:21:08',
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'اسم الشركة ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 2,
                'created_at' => '2024-04-13 07:25:22',
                'updated_at' => '2024-04-13 07:25:36',
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'اختصاص الشركة ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 2,
                'created_at' => '2024-04-13 07:25:22',
                'updated_at' => '2024-04-13 07:25:36',
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'الألوان المفضلة',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 2,
                'created_at' => '2024-04-13 07:25:22',
                'updated_at' => '2024-04-13 07:25:36',
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'الثيم',
                'type' => 'select',
                'options' => '[{"name":"\\u0647\\u0627\\u062f\\u0626"},{"name":"\\u0645\\u0641\\u0639\\u0645"},{"name":"\\u0641\\u062e\\u0645"}]',
                'is_required' => 1,
                'event_id' => 2,
                'created_at' => '2024-04-13 07:25:22',
                'updated_at' => '2024-04-13 07:25:36',
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'هل تريد / تريدين  إضاءة إضافية ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 2,
                'created_at' => '2024-04-13 07:25:22',
                'updated_at' => '2024-04-13 07:25:36',
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'اسم العروس',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 3,
                'created_at' => '2024-04-13 07:30:18',
                'updated_at' => '2024-04-13 07:44:01',
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'اسم العريس',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 3,
                'created_at' => '2024-04-13 07:30:18',
                'updated_at' => '2024-04-13 07:44:01',
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'الألوان المفضلة ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 3,
                'created_at' => '2024-04-13 07:30:18',
                'updated_at' => '2024-04-13 07:44:01',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'الثيم  ',
                'type' => 'select',
                'options' => '[{"name":"\\u0647\\u0627\\u062f\\u0626"},{"name":"\\u0645\\u0641\\u0639\\u0645"},{"name":"\\u0641\\u062e\\u0645"}]',
                'is_required' => 1,
                'event_id' => 3,
                'created_at' => '2024-04-13 07:30:18',
                'updated_at' => '2024-04-13 07:44:01',
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'هل تريد / تريدين  إضاءة إضافية ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 3,
                'created_at' => '2024-04-13 07:30:18',
                'updated_at' => '2024-04-13 07:44:01',
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'هل تريد / تريدين بإضافة أكاليل زهور ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 3,
                'created_at' => '2024-04-13 07:30:18',
                'updated_at' => '2024-04-13 07:44:01',
            ),
            17 =>
            array(
                'id' => 18,
                'name' => 'اسم العروس',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 4,
                'created_at' => '2024-04-13 07:34:26',
                'updated_at' => '2024-04-13 07:47:30',
            ),
            18 =>
            array(
                'id' => 19,
                'name' => 'اسم العريس ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 4,
                'created_at' => '2024-04-13 07:34:26',
                'updated_at' => '2024-04-13 07:47:31',
            ),
            19 =>
            array(
                'id' => 20,
                'name' => 'الألوان المفضلة',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 4,
                'created_at' => '2024-04-13 07:34:26',
                'updated_at' => '2024-04-13 07:47:31',
            ),
            20 =>
            array(
                'id' => 21,
                'name' => 'الثيم  ',
                'type' => 'select',
                'options' => '[{"name":"\\u0647\\u0627\\u062f\\u0626"},{"name":"\\u0641\\u062e\\u0645"},{"name":"\\u0645\\u0641\\u0639\\u0645"}]',
                'is_required' => 1,
                'event_id' => 4,
                'created_at' => '2024-04-13 07:34:26',
                'updated_at' => '2024-04-13 07:47:31',
            ),
            21 =>
            array(
                'id' => 22,
                'name' => 'هل تريد / تريدين  إضاءة إضافية ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 4,
                'created_at' => '2024-04-13 07:34:26',
                'updated_at' => '2024-04-13 07:47:31',
            ),
            22 =>
            array(
                'id' => 23,
                'name' => 'هل تريد / تريدين بإضافة أكاليل زهور ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 4,
                'created_at' => '2024-04-13 07:34:26',
                'updated_at' => '2024-04-13 07:47:31',
            ),
            23 =>
            array(
                'id' => 24,
                'name' => 'اسم الأب ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 5,
                'created_at' => '2024-04-13 07:38:35',
                'updated_at' => '2024-04-13 07:38:35',
            ),
            24 =>
            array(
                'id' => 25,
                'name' => 'اسم الأم  ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 5,
                'created_at' => '2024-04-13 07:38:35',
                'updated_at' => '2024-04-13 07:38:35',
            ),
            25 =>
            array(
                'id' => 26,
                'name' => 'اسم المولود  ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 5,
                'created_at' => '2024-04-13 07:38:35',
                'updated_at' => '2024-04-13 07:38:35',
            ),
            26 =>
            array(
                'id' => 27,
                'name' => 'جنس المولود ',
                'type' => 'select',
                'options' => '[{"name":"\\u0630\\u0643\\u0631"},{"name":"\\u0623\\u0646\\u062b\\u0649"},{"name":"\\u062a\\u0648\\u0623\\u0645 \\u0623\\u0646\\u062b\\u0649 \\u0648 \\u0630\\u0643\\u0631"}]',
                'is_required' => 1,
                'event_id' => 5,
                'created_at' => '2024-04-13 07:38:35',
                'updated_at' => '2024-04-13 07:38:35',
            ),
            27 =>
            array(
                'id' => 28,
                'name' => 'الثيم  ',
                'type' => 'select',
                'options' => '[{"name":"\\u0647\\u0627\\u062f\\u0626"},{"name":"\\u0641\\u062e\\u0645"},{"name":"\\u0645\\u0641\\u0639\\u0645"}]',
                'is_required' => 1,
                'event_id' => 5,
                'created_at' => '2024-04-13 07:38:35',
                'updated_at' => '2024-04-13 07:38:35',
            ),
            28 =>
            array(
                'id' => 29,
                'name' => 'هل تريد / تريدين  إضاءة إضافية ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 5,
                'created_at' => '2024-04-13 07:38:35',
                'updated_at' => '2024-04-13 07:38:35',
            ),
            29 =>
            array(
                'id' => 30,
                'name' => 'اسم صاحب الاحتفال',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 6,
                'created_at' => '2024-04-13 07:42:19',
                'updated_at' => '2024-04-13 07:42:19',
            ),
            30 =>
            array(
                'id' => 31,
                'name' => 'الاختصاص ',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 6,
                'created_at' => '2024-04-13 07:42:19',
                'updated_at' => '2024-04-13 07:42:19',
            ),
            31 =>
            array(
                'id' => 32,
                'name' => 'الجنس  ',
                'type' => 'select',
                'options' => '[{"name":"\\u0623\\u0646\\u062b\\u0649"},{"name":"\\u0630\\u0643\\u0631"}]',
                'is_required' => 1,
                'event_id' => 6,
                'created_at' => '2024-04-13 07:42:19',
                'updated_at' => '2024-04-13 07:42:19',
            ),
            32 =>
            array(
                'id' => 33,
                'name' => 'الألوان المفضلة',
                'type' => 'string',
                'options' => '[]',
                'is_required' => 1,
                'event_id' => 6,
                'created_at' => '2024-04-13 07:42:19',
                'updated_at' => '2024-04-13 07:42:19',
            ),
            33 =>
            array(
                'id' => 34,
                'name' => 'الثيم  ',
                'type' => 'select',
                'options' => '[{"name":"\\u0647\\u0627\\u062f\\u0626"},{"name":"\\u0641\\u062e\\u0645"},{"name":"\\u0645\\u0641\\u0639\\u0645"}]',
                'is_required' => 1,
                'event_id' => 6,
                'created_at' => '2024-04-13 07:42:19',
                'updated_at' => '2024-04-13 07:42:19',
            ),
            34 =>
            array(
                'id' => 35,
                'name' => 'هل تريد / تريدين  إضاءة إضافية ؟',
                'type' => 'select',
                'options' => '[{"name":"\\u0646\\u0639\\u0645"},{"name":"\\u0644\\u0627"}]',
                'is_required' => 1,
                'event_id' => 6,
                'created_at' => '2024-04-13 07:42:19',
                'updated_at' => '2024-04-13 07:42:19',
            ),
        ));
    }
}
