@extends('layout.layout')
@section('content')
            @foreach ($mappedQuestions as $group => $questions)
                <div class="mt-4">
                    <div
                        style="background-color:rgb(80, 80, 222) ; display: flex; justify-content: space-between; align-items: center;">
                        <p style="color: white; margin: 0; padding-left: 10px; padding-top: 10px;">
                            {{ $templateNames[$group] ?? '' }}
                        </p>
                    </div>

                    <table style="border-collapse: collapse; width: 100%;">
                        <thead>
                            <tr>
                                <th
                                    style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    #</th>
                                <th
                                    style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    Question</th>
                                <th
                                    style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    Score</th>
                                <th
                                    style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    Objective Evidence</th>
                                <th
                                    style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    Suggestion</th>
                                <th
                                    style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    Evidence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $index => $question)
                                <tr class="{{ $question->response_id ? 'text-primary' : 'text-danger' }}" style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                    <td style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">{{ $index + 1 }}</td>
                                    <td style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">{{ $question->question }}</td>
                                    <td style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">{{ $question->response_score ?? '' }}</td>
                                    <td style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">{!! $question->objective_evidences ?? '' !!}</td>
                                    <td style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">{!! $question->suggestions ?? '' !!}</td>
                                    <td style="padding: 5px; border: 1px solid rgb(80, 80, 222); text-align: left; font-size:14px;">
                                        @if (!empty($question->evidences))
                                            @foreach (json_decode($question->evidences) as $evidence)
                                                <img src="{{ asset($evidence) }}" alt="Evidence Image"
                                                    style="max-width: 130px; max-height: 130px; display: block; margin-bottom: 5px;">
                                            @endforeach
                                        @else
                                            
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
@endsection

<script>
     document.addEventListener('keydown', function(event) {
        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'p') {
            event.preventDefault();
        } else if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 's') {
            event.preventDefault();
        } else if (event.key === 'S' && event.shiftKey && event.metaKey) {
            event.preventDefault();
        } else if (event.code === 'PrintScreen') {
            event.preventDefault();
        }
    });
</script>