@php
  $form=$data['form'];
  $lead=$data['lead'];
  $fields = $form->fields;
@endphp
<h1 style="font-size: 22px">{!! $data["title"] !!}</h1>
<p style="font-size: 16px">
  {!! $data["message"]!!}
</p>

<table style="width: 100%;border-collapse: collapse;" role="presentation" cellpadding="0" cellspacing="0" border="0">
  <tbody>
  @foreach($fields as $field)
    <tr>
      <td>
        <table style="width: 100%;border-collapse: collapse;" role="presentation" cellpadding="0" cellspacing="0"
               border="0">
          <tbody>
          @foreach($fields as $field)

            @php
              $isTypeTwelve = false;
              $isTypeTwelve = isset($field->type) && $field->type == 12;
            @endphp

            <tr>
              <td style="width:100%; padding-top: 5px; padding-bottom: 5px;">
                <table style="width: 100%;border-collapse: collapse;" role="presentation" cellpadding="0"
                       cellspacing="0" border="0">
                  <tbody>
                  <tr>
                    <td style="width: 100%" align="left">
                      <table>
                        <tr>
                          <th
                            style="background-color:#a5a5a53b;padding:15px 10px 15px;margin:0;font-weight:600;color:#212529;font-size:14px;line-height:1;text-transform:capitalize;text-align:left;width:100%;border-radius:4px 4px 4px 4px;"
                            align="left" width="100%">
                            {{ $field->label }}
                          </th>
                        </tr>
                        <tr>
                          <td
                            style="padding:20px 10px 20px;font-size:14px;font-weight:400;color:#212529;text-align:left;width:100%;"
                            align="left" width="100%">
                            {{$isTypeTwelve? url($lead->values[$field->name] ?? "") : ($lead->values[$field->name] ?? "")}}
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:10px;border-top:1px solid #ddd;"></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
