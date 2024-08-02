<tr>
    <td>
      <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
          <td class="content-cell" align="center">
            <!-- Add company information below the existing content -->
            <div style="margin-top: 20px; font-size: 12px; color: #666;">
              <p style="margin: 0;"> Archway Homes and Investment Limited</p>
              <p style="margin: 0;"> House 5, Angel Court, Metro Homes, General Paint.</p>
              <p style="margin: 0;">Email: <a href="mailto:info@yourcompany.com" style="color: #000052;"> info@archwayhomes.com</a></p>
              <p style="margin: 0;">Phone: +234 8037412674, </p>
            </div>
            {{ Illuminate\Mail\Markdown::parse($slot) }}
          </td>
        </tr>
      </table>
    </td>
</tr> 
  