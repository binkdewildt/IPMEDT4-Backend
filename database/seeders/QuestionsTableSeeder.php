<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Question;

class QuestionsTableSeeder extends Seeder
{

    private $questions = [
        [
            'question' => 'Je hebt momenteel 20 werknemers beschikbaar, hoe kan je ze het best verdelen?',
            'mcQuestion' => true,
            'answerA' => '1 bij mail, 9 bij agt, 6 bij pakketten, 1 bij dock, 1 splitter en 2 bij uitloop',
            'answerB' => '1 bij mail, 7 bij agt, 5 bij pakketten, 1 bij dock, 1 splitter en 5 bij uitloop',
            'answerC' => '8 bij agt, 7 bij pakketten, 1 splitter en 5 bij uitloop',
            'answerD' => '1 bij mail, 9 bij agt, 4 bij pakketten, 1 bij dock, 1 splitter en 4 bij uitloop',
            'reason' => 'Het is belangrijk dat er bijna altijd 5 mensen bij de uitloop zijn, zodat het daar vloeiend loopt. Voor de rest word het eerlijk verdelen tussen agt en pakketten, omdat daar de meeste binnenkomen',
            'correctAnswer' => 'B',
            'points' => 10,
        ],

        [
            'question' => 'Er zijn 29 mensen om te verdelen, welke zet je waar neer?',
            'mcQuestion' => true,
            'answerA' => '2 bij mail, 12 bij agt, 7 bij pakketten, 1 bij dock, 1 splitter en 6 bij uitloop',
            'answerB' => '1 bij mail, 11 bij agt, 7 bij pakketten, 1 bij dock, 1 splitter en 8 bij uitloop',
            'answerC' => '1 bij mail, 10 bij agt, 9 bij pakketten, 1 bij dock, 1 splitter en 7 bij uitloop',
            'answerD' => '2 bij mail, 11 bij agt, 8 bij pakketten, 1 bij dock, 1 splitter en 6 bij uitloop',
            'reason' => 'Om te zorgen dat de pakketten vloeiend blijven komen, zijn er niet meer dan 6 medewerkers nodig bij de uitloop. Verder moet je een goede balans zoeken tussen agt en pakketten',
            'correctAnswer' => 'D',
            'points' => 10,
        ],

        [
            'question' => 'Als er 24 mensen zijn, hoeveel mensen zet je neer bij de uitloopcarré?',
            'mcQuestion' => true,
            'answerA' => '5 mensen bij de uitloop',
            'answerB' => '6 mensen bij de uitloop',
            'answerC' => '4 mensen bij de uitloop',
            'answerD' => '8 mensen bij de uitloop',
            'reason' => 'Om het goed te verdelen, moeten er 1 bij mail, 9 bij agt, 6 bij pakketten, 1 bij dock, 1 splitter en dan natuurlijk 6 mensen bij de uitloop',
            'correctAnswer' => 'B',
            'points' => 10,
        ],

        [
            'question' => 'Er zijn 11 mensen aanwezig bij de AGT werkplekken, wat is dan de aantal mensen die er bij Pakketten moeten staan',
            'mcQuestion' => true,
            'answerA' => '3',
            'answerB' => '6',
            'answerC' => '5',
            'answerD' => '7',
            'reason' => 'Als er 11 aanwezig bij de agt, dan zullen er 1 bij de mail, 1 bij dock en 1 splitter aanwezig zijn. Ook zullen er 6 uitloop aanwezig zijn. Dat houd dan pakketten over, en deze zullen dan 7 zijn, zodat de pakketten mooi terug komen',
            'correctAnswer' => 'D',
            'points' => 10,
        ],

        [
            'question' => 'Als je 31 werknemers hebt, waar staat het grootste aantal dan? ',
            'mcQuestion' => false,
            'answerA' => null,
            'answerB' => null,
            'answerC' => null,
            'answerD' => null,
            'reason' => 'Altijd is het agt waarbij het grootste aantal medewerkers staat, omdat er veel aandacht aan besteed word',
            'correctAnswer' => 'agt',
            'points' => 10,
        ],

        [
            'question' => 'Je hebt momenteel niet genoeg mensen, met een maximaal van 18 personen vandaag. Waar zet je de meeste mensen neer?',
            'mcQuestion' => true,
            'answerA' => 'Bij uitloop',
            'answerB' => 'Bij agt',
            'answerC' => 'Bij pakketten',
            'answerD' => 'Bij mail',
            'reason' => 'Zoals eerder benoemd blijft agt de meeste werknemers eisen, omdat er eenmaal veel aandacht aan besteed moet worden',
            'correctAnswer' => 'B',
            'points' => 10,
        ],

        [
            'question' => 'De splitter van vandaag heeft zich ziek gemeld. Bij uitloopcarré staan er 7 personen, en bij AGT zijn er 13 personen. Ook bij pakketten zijn er 8 personen. Waarvandaan neem je de persoon?',
            'mcQuestion' => true,
            'answerA' => 'van pakketten',
            'answerB' => 'van uitloop',
            'answerC' => 'van agt',
            'answerD' => null,
            'reason' => 'Er is momenteel een overschot aan agt medewerkers, dus het beste is om er daar vandaan eentje te nemen',
            'correctAnswer' => 'C',
            'points' => 10,
        ],

        [
            'question' => 'Iedereen van de pakketten is ziek vandaag. Hoe verdeel je de 23 overige personen?',
            'mcQuestion' => true,
            'answerA' => '10 bij agt, 5 bij pakketten en 6 bij uitloop',
            'answerB' => '9 bij agt, 5 bij pakketten en 7 bij uitloop',
            'answerC' => '10 bij agt, 6 bij pakketten, en 5 bij uitloop',
            'answerD' => '9 bij agt, 6 bij pakketten, en 6 bij uitloop',
            'reason' => 'Met 6 uitloop heb je genoeg mensen om dat werkend te krijgen. Verder moet je een goede balans tussen agt en pakketten weer vinden.',
            'correctAnswer' => 'A',
            'points' => 10,
        ],

        [
            'question' => 'Uitloopcarré loopt helemaal vast vandaag. Er zijn meer medewerkers nodig. Waar haal je deze vandaag?',
            'mcQuestion' => true,
            'answerA' => 'Bij agt waar 13 personen staan',
            'answerB' => 'Bij pakketten waar 8 personen staan',
            'answerC' => 'Bij post waar 2 personen staan',
            'answerD' => null,
            'reason' => 'Het beste is om het van pakketten af te nemen, omdat deze minder lastig is dan agt, en makkelijker een persoon kan missen',
            'correctAnswer' => 'B',
            'points' => 10,
        ],

        [
            'question' => 'Meerdere mensen zijn ongeoorlooft afwezig. Wat kan je het beste doen?',
            'mcQuestion' => true,
            'answerA' => 'Werknemers pushen om extreem harder te werken waardoor de gaten worden opgevuld',
            'answerB' => 'Vragen of er toch mensen zijn die extra bij kunnen werken',
            'answerC' => 'Positie omruilen van mensen waardoor het beter of slechter gaat',
            'answerD' => null,
            'reason' => 'Als je om extra mensen vraagt, heb je altijd de mogelijkheid om meer voor elkaar te krijgen, waardoor er minder problemen zullen zijn',
            'correctAnswer' => 'B',
            'points' => 10,
        ],

        [
            'question' => 'Er is extra hulp onderweg vandaag, maar wat kan je het best momenteel doen totdat ze er zijn?',
            'mcQuestion' => true,
            'answerA' => 'Taken beter verdelen zodat er een constante flow blijft',
            'answerB' => 'Alle medewerkers bij de sorteerders zetten zodat de hulp aan de gang kan bij uitloopcarré nadat ze er zijn',
            'answerC' => 'Niks doen en pas beginnen als de hulp er is',
            'answerD' => null,
            'reason' => 'Het beste is om een constant flow te hebben, waardoor er constant pakketten wel door blijven gaan en aankomen',
            'correctAnswer' => 'A',
            'points' => 10,
        ],

        [
            'question' => 'Er komt vandaag extra veel mail binnen, dus vandaag moeten daar sowieso 2 personen blijven staan, waar neem je de 2e persoon vandaan?',
            'mcQuestion' => true,
            'answerA' => 'Uitloopcarré, waar momenteel 7 mensen staan',
            'answerB' => 'Pakketten, waar momenteel 8 mensen staan',
            'answerC' => 'AGT, waar momenteel 13 mensen staan',
            'answerD' => null,
            'reason' => null,
            'correctAnswer' => 'C',
            'points' => 10,
        ],

        [
            'question' => 'Een medewerker voelt zich niet goed en zou graag naar huis willen, wat kan je het beste doen?',
            'mcQuestion' => false,
            'answerA' => null,
            'answerB' => null,
            'answerC' => null,
            'answerD' => null,
            'reason' => 'Het kan altijd gebeuren dat er iemand ziek word tijdens werk, geef daar de medewerkers ook ruimte voor. In de tussentijd probeer iemand te regelen die het kan overnemen',
            'correctAnswer' => 'vervanging regelen',
            'points' => 10,
        ],

        [
            'question' => 'De AGT werkplekken zijn rustiger dan eerder verwacht, waardoor er 2 werknemers ergens anders kunnen zitten. Waar worden deze neergezet?',
            'mcQuestion' => true,
            'answerA' => 'Bij pakketten',
            'answerB' => 'Bij uitloopcarré',
            'answerC' => 'Bij pakketten en uitloopcarré ieder 1',
            'answerD' => null,
            'reason' => 'Bij de mensen te verdelen zorgt het dat er meer pakketten gedaan worden en dat het sneller in de uitloop gaat',
            'correctAnswer' => 'C',
            'points' => 10,
        ],

        [
            'question' => 'Als leidinggevende moet je momenteel ook bijschieten, want de uitloopcarré loopt te vol op, waar kan je het best momenteel te hulp?',
            'mcQuestion' => true,
            'answerA' => 'Bij uitloopcarré',
            'answerB' => 'Bij agt',
            'answerC' => 'Bij mail',
            'answerD' => null,
            'reason' => 'Omdat de uitloopcarré vol loopt, is het het beste om daar ook bij te schieten',
            'correctAnswer' => 'A',
            'points' => 10,
        ],

        [
            'question' => 'Er zijn veel onbekende en bekende pakketten binnengekomen. Waar haal je de hulp vandaan?',
            'mcQuestion' => false,
            'answerA' => null,
            'answerB' => null,
            'answerC' => null,
            'answerD' => null,
            'reason' => 'Als er werknemers te kort zijn, is het altijd belangrijk om om extra medewerkers te vragen, en kijken of er toch extra mensen kunnen komen',
            'correctAnswer' => 'vragen om hulp',
            'points' => 10,
        ],

        [
            'question' => 'Er zijn momenteel 19 mensen aanwezig, wat eigenlijk te weinig is. Van de 19 mensen werken er 7 bij de pakketten, is dit goed en zo niet, waar kunnen ze anders staan?',
            'mcQuestion' => true,
            'answerA' => 'Ja, dit is goed en werkt prima',
            'answerB' => 'Ja, dit kan maar liever wordt het toch een beter verdeeld',
            'answerC' => 'Nee, beter kunnen er 2 bij de AGT staan',
            'answerD' => 'Nee, beter kunnen er 3 bij de uitloopcarré staan',
            'reason' => 'Als er 7 bij pakketten staat, zorgt dat geheid voor problemen. Daarvoor is het beter om ze toch bij agt te zetten, wat beter is',
            'correctAnswer' => 'C',
            'points' => 10,
        ],

        [
            'question' => 'Hoeveel medewerkers zijn er volgens jou minimaal nodig om het werkend te krijgen? Leg ook uit waarom',
            'mcQuestion' => false,
            'answerA' => null,
            'answerB' => null,
            'answerC' => null,
            'answerD' => null,
            'reason' => 'Met moeilijkheden is het beste om minimaal 24 werknemers te hebben, waardoor alles nog steeds goed verdeelt kan worden. Hierbij zorgt het dat er geen erge achterstand zal komen, maar wel alles voornamelijk gedaan wordt.',
            'correctAnswer' => '24',
            'points' => 10,
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->questions as $q) {
            Question::create($q);
        };
    }
}
