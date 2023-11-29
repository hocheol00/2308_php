<?php

namespace Database\Seeders;
use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '침실가구',
                'img' => '/images/pic1.jpg',
                'content' => '순백의 로망 클레어코튼으로 시작되는 로맨틱한 침실
                웨인스코팅 디자인의 우아한 침대 헤드, 웨인스코팅 스타일의 몰딩으로 면분할한 침대 헤드는 고급서러운 침실공간을 연출합니다
                LED조명으로 아늑하게 USB포트로 편리함까지, LED 무드 조명과 2구 USB포트가 내장되어 사용의 편리함을 더했습니다.
                하부공간 100% 수납의 극대화, 하부는 3단 서랍과 벙커식의 수납공간으로 구성되어 있어 공간을 효율적으로 사용할수 있습니다.
                순백의 로망 클레어코튼으로 시작되는 로맨틱침실 맑고 깨끗한 화이트 컬러의 클레어코튼은 웨인스코팅 스타일로 공간을 아름답게 완성합니다
                
                새로운 신혼의 아침을 클레어코튼과 시작하세요', 
                'created_at' => date('ymdhis'),
                'updated_at' => date('ymdhis')
                ]

            ,['name' => '거실가구',
                'img' => '/images/pic4.jpg',
                'content' => '공간을 더 새롭게 밝혀주는 커스텀 화이트 거실장
                집에 머무르는 시간이 많은 시대, 집 안의 작은 것부터 변화를 주어 트렌디한 거실을 연출 해보세요.
                모던한 레이아웃에 트렌디한 면분할이 돋보이는 커스텀화이트 거실세트로 품격있는 거실을 연출해보세요.
                부드럽고 실키한 촉감의 텍스쳐로 고급스러운 느낌을 자아냅니다
                자연 친화적 생활 공간을 창조함으로써 고객의 삶의 질을 향상시키고 소비자의 생활문화를 창조하는 기업입니다.',
                'created_at' => date('ymdhis'),
                'updated_at' => date('ymdhis')
                ]

            ,['name' => '주방가구',
                'img' => '/images/pic3.jpg',
                'content' => '꾸이꾸이잉',
                'created_at' => date('ymdhis'),
                'updated_at' => date('ymdhis')
                ]
            ];
        Board::insert($data);
    }
}
