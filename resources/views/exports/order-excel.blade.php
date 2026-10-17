<html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @php
        echo '<!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>SPK Workshop Pande Oka</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->';
    @endphp
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #1c1917;
            background-color: #ffffff;
        }
        .header-title {
            font-size: 18pt;
            font-weight: bold;
            color: #c2410c;
            text-align: left;
        }
        .header-subtitle {
            font-size: 10pt;
            color: #78716c;
        }
        .meta-table td {
            font-size: 10pt;
            padding: 4px 8px;
        }
        .meta-label {
            font-weight: bold;
            color: #44403c;
            background-color: #f5f5f4;
            border: 0.5pt solid #d6d3d1;
        }
        .meta-val {
            color: #1c1917;
            border: 0.5pt solid #d6d3d1;
        }
        .item-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        .item-table th {
            background-color: #ea580c;
            color: #ffffff;
            font-size: 10pt;
            font-weight: bold;
            text-align: center;
            padding: 8px 10px;
            border: 1pt solid #c2410c;
        }
        .item-table td {
            font-size: 9.5pt;
            padding: 6px 8px;
            border: 0.5pt solid #d6d3d1;
            vertical-align: middle;
        }
        .item-table tr:nth-child(even) td {
            background-color: #fafaf9;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-bold { font-weight: bold; }
        .total-row td {
            font-size: 10pt;
            font-weight: bold;
            background-color: #ffedd5;
            border: 0.5pt solid #fdba74;
        }
        .grand-total td {
            font-size: 12pt;
            font-weight: bold;
            color: #9a3412;
            background-color: #fed7aa;
            border: 1pt solid #ea580c;
        }
        .note-box {
            background-color: #fef3c7;
            border: 1pt solid #f59e0b;
            color: #92400e;
            padding: 10px;
            font-size: 9.5pt;
        }
    </style>
</head>
<body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td colspan="7" class="header-title">
                PANDE OKA FURNITURE &amp; LIVING BALI
            </td>
        </tr>
        <tr>
            <td colspan="7" class="header-subtitle">
                SURAT PERINTAH KERJA (SPK) &bull; REKAP PESANAN WORKSHOP (OUTPUT PEMBELIAN)
            </td>
        </tr>
        <tr>
            <td colspan="7" style="font-size: 8pt; color: #a8a29e; border-bottom: 2pt solid #ea580c; padding-bottom: 8px;">
                Jl. Sunset Road No. 88, Kuta, Badung, Bali 80361 &bull; Telp/WA: +62 812-3456-7890 &bull; Website: www.pandeoka.id
            </td>
        </tr>
        <tr><td colspan="7" style="height: 12px;"></td></tr>
    </table>

    <table cellpadding="4" cellspacing="0" border="0" width="100%" class="meta-table">
        <tr>
            <td width="18%" class="meta-label">Nomor SPK / Pesanan</td>
            <td width="32%" class="meta-val text-bold">{{ $orderNumber }}</td>
            <td width="18%" class="meta-label">Tanggal Transaksi</td>
            <td width="32%" class="meta-val">{{ $orderDate }}</td>
        </tr>
        <tr>
            <td class="meta-label">Nama Pelanggan</td>
            <td class="meta-val text-bold">{{ $customerName }}</td>
            <td class="meta-label">Kontak / WhatsApp</td>
            <td class="meta-val">{{ $customerPhone }}</td>
        </tr>
        <tr>
            <td class="meta-label">Email Pemesan</td>
            <td class="meta-val">{{ $customerEmail }}</td>
            <td class="meta-label">Status Pengiriman</td>
            <td class="meta-val text-bold" style="color: #c2410c;">
                TANPA PENGIRIMAN EKSPEDISI (AMBIL SENDIRI / WORKSHOP PICKUP)
            </td>
        </tr>
        <tr>
            <td class="meta-label">Lokasi Pengambilan</td>
            <td colspan="3" class="meta-val">
                Workshop &amp; Showroom Pande Oka, Jl. Sunset Road No. 88, Kuta, Badung, Bali (Jam Operasional: 09:00 - 20:00 WITA)
            </td>
        </tr>
    </table>

    <table cellpadding="6" cellspacing="0" border="1" class="item-table" style="margin-top: 16px;">
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="28%">Nama Produk &amp; Material</th>
                <th width="16%">Pilihan Finishing</th>
                <th width="22%">Ukuran Dimensi (P x L x T)</th>
                <th width="6%">Qty</th>
                <th width="12%">Harga Satuan (Rp)</th>
                <th width="12%">Subtotal (Rp)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $idx => $item)
                @php
                    $prod = $item->product;
                    $unitPrice = (int) ($prod->price ?? 0);
                    $subtotal = $unitPrice * $item->quantity;
                    
                    // Parse variation into finishing & custom dimensions
                    $varText = $item->variation ?? '';
                    $finishing = $prod->finish ?? 'Natural Solid Wood';
                    $dimensions = $prod->dimensions ?? 'Ukuran Standar Workshop';

                    if (!empty($varText)) {
                        $parts = explode('•', $varText);
                        if (count($parts) >= 2) {
                            $finishing = trim($parts[0]);
                            $dimensions = trim($parts[1]);
                        } else {
                            $dimensions = trim($varText);
                        }
                    }
                @endphp
                <tr>
                    <td class="text-center">{{ $idx + 1 }}</td>
                    <td>
                        <strong style="color: #1c1917;">{{ $prod->name ?? 'Produk Kayu Solid' }}</strong><br/>
                        <span style="font-size: 8.5pt; color: #57534e;">Material: {{ $prod->wood_type ?? 'Kayu Jati / Sungkai Perhutani' }} (Kategori: {{ $prod->category ?? 'Furniture' }})</span>
                    </td>
                    <td>{{ $finishing }}</td>
                    <td style="color: #9a3412; font-weight: bold;">
                        {{ $dimensions }}
                    </td>
                    <td class="text-center font-bold">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($unitPrice, 0, ',', '.') }}</td>
                    <td class="text-right font-bold">{{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td colspan="5" class="text-right">Subtotal Produk:</td>
                <td colspan="2" class="text-right">{{ number_format($subtotalTotal, 0, ',', '.') }}</td>
            </tr>
            @if($discountTotal > 0)
                <tr class="total-row">
                    <td colspan="5" class="text-right" style="color: #15803d;">Potongan Voucher Diskon Toko:</td>
                    <td colspan="2" class="text-right" style="color: #15803d;">- {{ number_format($discountTotal, 0, ',', '.') }}</td>
                </tr>
            @endif
            <tr class="total-row">
                <td colspan="5" class="text-right">Ongkos Kirim Ekspedisi:</td>
                <td colspan="2" class="text-right">Rp 0 (Tanpa Pengiriman / Ambil di Workshop)</td>
            </tr>
            <tr class="grand-total">
                <td colspan="5" class="text-right" style="font-size: 11pt;">TOTAL PEMBAYARAN WORKSHOP:</td>
                <td colspan="2" class="text-right" style="font-size: 12pt;">Rp {{ number_format($grandTotal, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <br/>

    <table cellpadding="8" cellspacing="0" border="1" width="100%" class="note-box">
        <tr>
            <td>
                <strong>CATATAN PENTING &amp; KETENTUAN PRODUKSI WORKSHOP PANDE OKA:</strong>
                <ol style="margin-top: 6px; margin-bottom: 4px; padding-left: 20px;">
                    <li><strong>Tanpa Pengiriman:</strong> Seluruh produk diproses untuk serah-terima di Workshop Pande Oka Bali. Silakan tunjukkan file Excel / Nomor SPK ini kepada staf kami saat pengambilan barang.</li>
                    <li><strong>Ukuran Custom:</strong> Ukuran Panjang x Lebar x Tinggi (P x L x T) di atas diproses presisi sesuai permintaan kustomisasi pemesan oleh pengrajin kayu solid kami.</li>
                    <li><strong>Estimasi Pengerjaan:</strong> Pengerjaan kustomisasi dan finishing kayu solid memakan waktu 7 - 14 hari kerja sejak SPK ini diterbitkan.</li>
                    <li><strong>Garansi:</strong> Bergaransi resmi 5 tahun untuk struktur dan ketahanan kayu solid terhadap hama bubuk/rayap.</li>
                    <li><strong>Layanan Bantuan:</strong> Hubungi WhatsApp Workshop di <strong>+62 812-3456-7890</strong> untuk konfirmasi kesiapan barang dan jadwal pickup.</li>
                </ol>
            </td>
        </tr>
    </table>
</body>
</html>
