<?php

use Illuminate\Database\Seeder;
use App\Select;
use Illuminate\Support\Facades\DB;

class selectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Aion
        $select1 = Select::create([
            'name' => 'aionServer',
            'placeholder' => 'Сервер'
        ]);

        $select2 = Select::create([
            'name' => 'aionSide',
            'placeholder' => 'Сторона'
        ]);

        $select3 = Select::create([
            'name' => 'aionClass',
            'placeholder' => 'Класс'
        ]);

        $select4 = Select::create([
            'name' => 'aionType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 1,
            'select_id' => $select1->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 1,
            'select_id' => $select2->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 2,
            'select_id' => $select1->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 2,
            'select_id' => $select2->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 2,
            'select_id' => $select3->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 3,
            'select_id' => $select1->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 3,
            'select_id' => $select2->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 3,
            'select_id' => $select4->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 4,
            'select_id' => $select1->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 4,
            'select_id' => $select2->id,
        ]);

        // Albion Online
        // ???

        // Archeage (RU)
        $select5 = Select::create([
            'name' => 'ArcheageRuServer',
            'placeholder' => 'Сервер'
        ]);

        $select6 = Select::create([
            'name' => 'ArcheageRuRace',
            'placeholder' => 'Раса'
        ]);

        $select7 = Select::create([
            'name' => 'ArcheageRuPathGrowth',
            'placeholder' => 'Путь Развития'
        ]);

        $select8 = Select::create([
            'name' => 'ArcheageRuType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 10,
            'select_id' => $select5->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 11,
            'select_id' => $select5->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 11,
            'select_id' => $select6->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 11,
            'select_id' => $select7->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 12,
            'select_id' => $select5->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 12,
            'select_id' => $select8->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 13,
            'select_id' => $select5->id,
        ]);

        // Black Desert RU
        // ???
        $select9 = Select::create([
            'name' => 'BlackDesertRuClass',
            'placeholder' => 'Класс'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 14,
            'select_id' => $select9->id,
        ]);

        // BLADE AND SOUL
        $select10 = Select::create([
            'name' => 'BladeAndSoulServer',
            'placeholder' => 'Сервер'
        ]);

        $select11 = Select::create([
            'name' => 'BladeAndSoulRace',
            'placeholder' => 'Раса'
        ]);

        $select12 = Select::create([
            'name' => 'BladeAndSoulClass',
            'placeholder' => 'Класс'
        ]);

        $select13 = Select::create([
            'name' => 'BladeAndSoulCategory',
            'placeholder' => 'Категория'
        ]);

        $select14 = Select::create([
            'name' => 'BladeAndSoulRank',
            'placeholder' => 'Ранг'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 18,
            'select_id' => $select10->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 19,
            'select_id' => $select10->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 19,
            'select_id' => $select11->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 19,
            'select_id' => $select12->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 20,
            'select_id' => $select10->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 20,
            'select_id' => $select13->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 20,
            'select_id' => $select14->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 21,
            'select_id' => $select10->id,
        ]);

        // Clash of Clans
        // ???

        $select15 = Select::create([
            'name' => 'ClashOfClansTownHallLevel',
            'placeholder' => 'Уровень Ратуши'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 22,
            'select_id' => $select15->id,
        ]);

        // Crossout
        // ???

        // CS GO
        $select16 = Select::create([
            'name' => 'CSGORank',
            'placeholder' => 'Ранг'
        ]);

        $select17 = Select::create([
            'name' => 'CSGOInventory',
            'placeholder' => 'Инвентарь'
        ]);

        $select18 = Select::create([
            'name' => 'CSGOPrime',
            'placeholder' => 'Prime'
        ]);

        $select19 = Select::create([
            'name' => 'CSGOType',
            'placeholder' => 'Тип'
        ]);

        $select20 = Select::create([
            'name' => 'CSGORare',
            'placeholder' => 'Раритетность'
        ]);

        $select21 = Select::create([
            'name' => 'CSGOQuality',
            'placeholder' => 'Качество'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 29,
            'select_id' => $select16->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 29,
            'select_id' => $select17->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 29,
            'select_id' => $select18->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 30,
            'select_id' => $select19->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 30,
            'select_id' => $select20->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 30,
            'select_id' => $select21->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 31,
            'select_id' => $select19->id,
        ]);

        // Destiny 2
        $select22 = Select::create([
            'name' => 'Destiny2Server',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 32,
            'select_id' => $select22->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 33,
            'select_id' => $select22->id,
        ]);

        // Diablo 3

        $select23 = Select::create([
            'name' => 'Diablo3Server',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 34,
            'select_id' => $select23->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 35,
            'select_id' => $select23->id,
        ]);

        // Dota 2
        // ???
        $select24 = Select::create([
            'name' => 'Dota2Type',
            'placeholder' => 'Тип'
        ]);

        $select25 = Select::create([
            'name' => 'Dota2Hero',
            'placeholder' => 'Герой'
        ]);

        $select26 = Select::create([
            'name' => 'Dota2Rare',
            'placeholder' => 'Раритетность'
        ]);

        $select27 = Select::create([
            'name' => 'Dota2Quality',
            'placeholder' => 'Качество'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 37,
            'select_id' => $select24->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 37,
            'select_id' => $select25->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 37,
            'select_id' => $select26->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 37,
            'select_id' => $select27->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 38,
            'select_id' => $select24->id,
        ]);

        // Elder Scrolls Online
        $select28 = Select::create([
            'name' => 'ElderScrollsOnlineServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 39,
            'select_id' => $select28->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 40,
            'select_id' => $select28->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 41,
            'select_id' => $select28->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 42,
            'select_id' => $select28->id,
        ]);

        // Escape From Tarkov
        // ???
        $select29 = Select::create([
            'name' => 'EscapeFromTarkovType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 48,
            'select_id' => $select29->id,
        ]);

        // EVE Online
        // ???
        $select30 = Select::create([
            'name' => 'EVEOnlineRace',
            'placeholder' => 'Раса'
        ]);

        $select31 = Select::create([
            'name' => 'EVEOnlineCategory',
            'placeholder' => 'Категория'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 51,
            'select_id' => $select30->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 52,
            'select_id' => $select31->id,
        ]);

        // Fifa
        $select32 = Select::create([
            'name' => 'FifaServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 54,
            'select_id' => $select32->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 55,
            'select_id' => $select32->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 56,
            'select_id' => $select32->id,
        ]);

        // GTA 5
        $select33 = Select::create([
            'name' => 'GTA5Server',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 57,
            'select_id' => $select33->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 58,
            'select_id' => $select33->id,
        ]);

        // GTA SAMP, CRMP, RP
        $select34 = Select::create([
            'name' => 'GTASAMPServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 59,
            'select_id' => $select34->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 60,
            'select_id' => $select34->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 61,
            'select_id' => $select34->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 62,
            'select_id' => $select34->id,
        ]);

        // Guild Wars 2
        $select35 = Select::create([
            'name' => 'GuildWars2Server',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 63,
            'select_id' => $select35->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 64,
            'select_id' => $select35->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 65,
            'select_id' => $select35->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 66,
            'select_id' => $select35->id,
        ]);

        // Gwent
        // ???

        // Hearthstone
        $select36 = Select::create([
            'name' => 'HearthstoneServer',
            'placeholder' => 'Сервер'
        ]);

        $select37 = Select::create([
            'name' => 'HearthstoneType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 69,
            'select_id' => $select36->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 70,
            'select_id' => $select36->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 70,
            'select_id' => $select37->id,
        ]);

        // League of Legends
        $select38 = Select::create([
            'name' => 'LeagueOfLegendsServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 71,
            'select_id' => $select38->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 72,
            'select_id' => $select38->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 73,
            'select_id' => $select38->id,
        ]);

        // LINAGE 2 CLASSIC EU/NA
        $select39 = Select::create([
            'name' => 'Lineage2ClassicEUNAServer',
            'placeholder' => 'Сервер'
        ]);

        $select40 = Select::create([
            'name' => 'Lineage2ClassicEUNARace',
            'placeholder' => 'Раса'
        ]);

        $select41 = Select::create([
            'name' => 'Lineage2ClassicEUNAEquipment',
            'placeholder' => 'Экипировка'
        ]);

        $select42 = Select::create([
            'name' => 'Lineage2ClassicEUNACategory',
            'placeholder' => 'Категория'
        ]);

        $select43 = Select::create([
            'name' => 'Lineage2ClassicEUNARank',
            'placeholder' => 'Ранг'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 74,
            'select_id' => $select39->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 75,
            'select_id' => $select39->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 75,
            'select_id' => $select40->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 75,
            'select_id' => $select41->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 76,
            'select_id' => $select39->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 76,
            'select_id' => $select42->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 76,
            'select_id' => $select43->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 77,
            'select_id' => $select39->id,
        ]);

        // LINAGE 2 RU
        $select44 = Select::create([
            'name' => 'Lineage2RUServer',
            'placeholder' => 'Сервер'
        ]);

        $select45 = Select::create([
            'name' => 'Lineage2RURace',
            'placeholder' => 'Раса'
        ]);

        $select46 = Select::create([
            'name' => 'Lineage2RUEquipment',
            'placeholder' => 'Экипировка'
        ]);

        $select47 = Select::create([
            'name' => 'Lineage2RUCategory',
            'placeholder' => 'Категория'
        ]);

        $select48 = Select::create([
            'name' => 'Lineage2RURank',
            'placeholder' => 'Ранг'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 78,
            'select_id' => $select44->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 79,
            'select_id' => $select44->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 79,
            'select_id' => $select45->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 79,
            'select_id' => $select46->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 80,
            'select_id' => $select44->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 80,
            'select_id' => $select47->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 80,
            'select_id' => $select48->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 81,
            'select_id' => $select44->id,
        ]);

        // LINAGE 2 FREE
        $select49 = Select::create([
            'name' => 'Lineage2FreeServer',
            'placeholder' => 'Сервер'
        ]);

        $select50 = Select::create([
            'name' => 'Lineage2FreeRace',
            'placeholder' => 'Раса'
        ]);

        $select51 = Select::create([
            'name' => 'Lineage2FreeEquipment',
            'placeholder' => 'Экипировка'
        ]);

        $select52 = Select::create([
            'name' => 'Lineage2FreeCategory',
            'placeholder' => 'Категория'
        ]);

        $select53 = Select::create([
            'name' => 'Lineage2FreeRank',
            'placeholder' => 'Ранг'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 82,
            'select_id' => $select49->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 83,
            'select_id' => $select49->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 84,
            'select_id' => $select49->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 84,
            'select_id' => $select50->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 84,
            'select_id' => $select51->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 85,
            'select_id' => $select49->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 85,
            'select_id' => $select52->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 85,
            'select_id' => $select53->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 86,
            'select_id' => $select49->id,
        ]);

        // Neverwinter Online
        $select54 = Select::create([
            'name' => 'NeverwinterOnlineServer',
            'placeholder' => 'Сервер'
        ]);

        $select55 = Select::create([
            'name' => 'NeverwinterOnlineRace',
            'placeholder' => 'Раса'
        ]);

        $select56 = Select::create([
            'name' => 'NeverwinterOnlineClass',
            'placeholder' => 'Класс'
        ]);

        $select57 = Select::create([
            'name' => 'NeverwinterOnlineType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 87,
            'select_id' => $select54->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 88,
            'select_id' => $select54->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 88,
            'select_id' => $select55->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 88,
            'select_id' => $select56->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 89,
            'select_id' => $select54->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 89,
            'select_id' => $select57->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 90,
            'select_id' => $select54->id,
        ]);

        // Overwatch
        // ???

        // Path Of Exile
        $select58 = Select::create([
            'name' => 'PathOfExileServer',
            'placeholder' => 'Сервер'
        ]);

        $select59 = Select::create([
            'name' => 'PathOfExileType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 94,
            'select_id' => $select58->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 95,
            'select_id' => $select58->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 96,
            'select_id' => $select58->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 96,
            'select_id' => $select59->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 97,
            'select_id' => $select58->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 97,
            'select_id' => $select59->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 98,
            'select_id' => $select58->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 99,
            'select_id' => $select58->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 99,
            'select_id' => $select59->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 100,
            'select_id' => $select58->id,
        ]);

        // Perfect World RU
        $select60 = Select::create([
            'name' => 'PerfectWorldRUServer',
            'placeholder' => 'Сервер'
        ]);

        $select61 = Select::create([
            'name' => 'PerfectWorldRURace',
            'placeholder' => 'Раса'
        ]);

        $select62 = Select::create([
            'name' => 'PerfectWorldRUType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 101,
            'select_id' => $select60->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 102,
            'select_id' => $select60->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 102,
            'select_id' => $select61->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 103,
            'select_id' => $select60->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 103,
            'select_id' => $select62->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 104,
            'select_id' => $select60->id,
        ]);

        // PUBG
        $select63 = Select::create([
            'name' => 'PUBGServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 105,
            'select_id' => $select63->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 106,
            'select_id' => $select63->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 107,
            'select_id' => $select63->id,
        ]);

        // Revelation Online
        $select64 = Select::create([
            'name' => 'RevelationOnlineServer',
            'placeholder' => 'Сервер'
        ]);

        $select65 = Select::create([
            'name' => 'RevelationOnlineClass',
            'placeholder' => 'Класс'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 108,
            'select_id' => $select64->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 109,
            'select_id' => $select64->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 109,
            'select_id' => $select65->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 110,
            'select_id' => $select64->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 111,
            'select_id' => $select64->id,
        ]);

        // Tom Clancys Rainbow Six
        $select66 = Select::create([
            'name' => 'TomClancysRainbowSixServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 112,
            'select_id' => $select66->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 113,
            'select_id' => $select66->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 114,
            'select_id' => $select66->id,
        ]);

        // War Thunder
        $select67 = Select::create([
            'name' => 'WarThunderServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 115,
            'select_id' => $select67->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 116,
            'select_id' => $select67->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 117,
            'select_id' => $select67->id,
        ]);

        // Warface
        $select68 = Select::create([
            'name' => 'WarfaceServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 118,
            'select_id' => $select68->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 119,
            'select_id' => $select68->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 120,
            'select_id' => $select68->id,
        ]);

        // Warframe
        $select69 = Select::create([
            'name' => 'WarframeServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 121,
            'select_id' => $select69->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 122,
            'select_id' => $select69->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 123,
            'select_id' => $select69->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 124,
            'select_id' => $select69->id,
        ]);

        // World of Tanks
        $select70 = Select::create([
            'name' => 'WorldofTanksServer',
            'placeholder' => 'Сервер'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 125,
            'select_id' => $select70->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 126,
            'select_id' => $select70->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 127,
            'select_id' => $select70->id,
        ]);

        //World of Warships
        // ???

        // Wow Free
        $select71 = Select::create([
            'name' => 'WowFreeServer',
            'placeholder' => 'Сервер'
        ]);

        $select72 = Select::create([
            'name' => 'WowFreeSide',
            'placeholder' => 'Сторона'
        ]);

        $select73 = Select::create([
            'name' => 'WowFreeRace',
            'placeholder' => 'Раса'
        ]);

        $select74 = Select::create([
            'name' => 'WowFreeClass',
            'placeholder' => 'Класс'
        ]);

        $select75 = Select::create([
            'name' => 'WowFreeType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 130,
            'select_id' => $select71->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 130,
            'select_id' => $select72->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 131,
            'select_id' => $select71->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 131,
            'select_id' => $select72->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 131,
            'select_id' => $select73->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 131,
            'select_id' => $select74->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 132,
            'select_id' => $select71->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 132,
            'select_id' => $select72->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 132,
            'select_id' => $select75->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 133,
            'select_id' => $select71->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 133,
            'select_id' => $select72->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 133,
            'select_id' => $select75->id,
        ]);

        // Wow RU EU
        $select76 = Select::create([
            'name' => 'WowFreeServer',
            'placeholder' => 'Сервер'
        ]);

        $select77 = Select::create([
            'name' => 'WowFreeSide',
            'placeholder' => 'Сторона'
        ]);

        $select78 = Select::create([
            'name' => 'WowFreeRace',
            'placeholder' => 'Раса'
        ]);

        $select79 = Select::create([
            'name' => 'WowFreeClass',
            'placeholder' => 'Класс'
        ]);

        $select80 = Select::create([
            'name' => 'WowFreeRaid',
            'placeholder' => 'Рейд'
        ]);

        $select81 = Select::create([
            'name' => 'WowFreeDifficulty',
            'placeholder' => 'Сложность'
        ]);

        $select82 = Select::create([
            'name' => 'WowFreeType',
            'placeholder' => 'Тип'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 134,
            'select_id' => $select76->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 134,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 135,
            'select_id' => $select76->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 135,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 135,
            'select_id' => $select78->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 135,
            'select_id' => $select79->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 136,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 136,
            'select_id' => $select80->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 136,
            'select_id' => $select81->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 137,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 137,
            'select_id' => $select81->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 138,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 138,
            'select_id' => $select82->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 139,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 139,
            'select_id' => $select82->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 140,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 140,
            'select_id' => $select82->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 141,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 142,
            'select_id' => $select77->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 142,
            'select_id' => $select82->id,
        ]);

        // Epic Games
        // ???

        // Origin
        // ???

        // Steam
        // ???
        $select83 = Select::create([
            'name' => 'SteamGenre',
            'placeholder' => 'Жанр'
        ]);

        $select84 = Select::create([
            'name' => 'SteamRegion',
            'placeholder' => 'Регион'
        ]);

        Db::table('category_select')->insert([
            'category_id' => 147,
            'select_id' => $select83->id,
        ]);

        Db::table('category_select')->insert([
            'category_id' => 147,
            'select_id' => $select84->id,
        ]);

        // Uplay
        // ???
    }
}
