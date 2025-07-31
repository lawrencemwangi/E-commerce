<x-admin-layout>
    <div class="title">
        <h1>Generated Quoatation</h1>
    </div>

    <div class="quotation-actions">
        <button id="download-btn" class="btn">Download Quotation</button>
        <button onclick="sendWhatsApp()" class="btn whatsapp">Send via WhatsApp</button>
    </div>

    <div class="quotation-container" id="quotation-content">
        <div class="quotation-card">
            <div class="company-header">
                <img src="{{ asset(config('site_settings.logo')) }}" alt="Company Logo">
                <h2>{{ config('site_settings.site_name') }}</h2>
                <p>Email: {{ config('site_settings.email') }}</p>
                <p>Phone: {{ config('site_settings.contact') }}</p>
                <p>Address: {{ config('site_settings.address') }}</p>
            </div>

            <h1>Quotation</h1>

            <div class="client-info">
                <p><strong>Client:</strong> {{ $quotation->names }}</p>
                <p><strong>Email:</strong> {{ $quotation->email }}</p>
                <p><strong>Contact:</strong> {{ $quotation->contact }}</p>
            </div>

            <div class="quotation-meta">
                <p><strong>Quotation No:</strong> <span class="text-success">{{ $quotation->quotation_no }}</span></p>
                <p><strong>Date:</strong> {{ $quotation->created_at->format('d M Y') }}</p>
            </div>

            <div class="item-table">
                <div class="item-header">
                    <span>Item</span>
                    <span>Color</span>
                    <span>Size</span>
                    <span>Qty</span>
                    <span>Price</span>
                    <span>Discount</span>
                    <span>Total</span>
                </div>
                <div class="item-row">
                    <span>{{ $quotation->collection->stock->item_name }}</span>
                    <span>{{ $quotation->color }}</span>
                    <span>{{ $quotation->size }}</span>
                    <span>{{ $quotation->quantity }}</span>
                    <span>KES {{ number_format($quotation->price, 2) }}</span>
                    <span>{{ $quotation->discount }}%</span>
                    <span>KES {{ number_format($quotation->total, 2) }}</span>
                </div>
            </div><br>

            {{-- <div class="description">
                <p><strong>Description:</strong> {{ $quotation->description ?? 'N/A' }}</p>
            </div> --}}
        
            
            <div class="quotation-footer">
                <hr>
                <p>Thank you for considering {{ config('site_settings.site_name') }}.</p>
                <p>For inquiries, reach us at <strong>{{ config('site_settings.email') }}</strong> or call <strong>{{ config('site_settings.contact') }}</strong>.</p>
                {{-- <p><em>This quotation is valid for 14 days from the date of issue.</em></p> --}}
            </div>
        </div>
    </div>
</x-admin-layout>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('download-btn').addEventListener('click', async function () {
            const element = document.getElementById('quotation-content');

            const canvas = await html2canvas(element);
            const imgData = canvas.toDataURL('image/png');

            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'mm', 'a4');
            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();

            const imgProps = pdf.getImageProperties(imgData);
            const pdfWidth = pageWidth;
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
            pdf.save('quotation.pdf');
        });

          window.sendWhatsApp = function () {
            let rawContact = "{{ $quotation->contact }}".replace(/\D/g, '');
            if (rawContact.startsWith('0')) {
                rawContact = '254' + rawContact.substring(1);
            } else if (rawContact.startsWith('+')) {
                rawContact = rawContact.substring(1); 
            }

            const message = `Hello {{ $quotation->names }}, your quotation is ready.%0AQuotation No: {{ $quotation->quotation_no }}%0ATotal: KES {{ number_format($quotation->total, 2) }}`;
            const whatsappURL = `https://wa.me/${rawContact}?text=${message}`;
            window.open(whatsappURL, '_blank');
        };
    });

</script>
