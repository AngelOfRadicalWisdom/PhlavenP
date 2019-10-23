
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>
<h1 style="text-align:center">Progress Chart</h1>
<table class="aligned-to-center"  style="color:black" id="customers">
    <tr>
            <td>Date Answered</td>
            <td>Exam Type</td>
        @foreach($lessons as $lesson)
            <td>{{$lesson->lesson_name}}</td>
        @endforeach
    </tr>

    @foreach($exams as $exam)
        @if($exam->examtype != "VAL")
        <tr>
                <td>{{$exam->datecreated}}</td>
                <td>{{$exam->examtype}}</td>
                @foreach($examscores as $examscore)
                    @if($exam->exam_ID == $examscore->exam_ID)
                        @if($examscore->percentage >80)
                        <td style="color:lime">{{$examscore->percentage}}%</td>
                        @elseif($examscore->percentage >50)
                        <td style="color:orange">{{$examscore->percentage}}%</td>
                        @else()
                        <td style="color:red">{{$examscore->percentage}}%</td>
                        @endif()
                    @endif()
                @endforeach()
        </tr>
        @endif()
    @endforeach
</table>