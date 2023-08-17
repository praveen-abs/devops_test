import html2pdf from 'html2pdf.js';

export default function usePdfGenerator() {
  async function generateAndDownloadPDF(htmlContent, fileName) {
    try {
      const options = {
        margin: 10,
        filename: fileName,
        image: { type: 'jpeg', quality: 0.98 }, // Adjust image quality for high quality
        html2canvas: { scale: 2 }, // Adjust scale for high quality
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
      };

      const pdf = await html2pdf().from(htmlContent).set(options).outputPdf();
      const blob = new Blob([pdf], { type: 'application/pdf' });
      const url = URL.createObjectURL(blob);

      // Create a temporary link and trigger download
      const link = document.createElement('a');
      link.href = url;
      link.download = fileName;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(url);
    } catch (error) {
      console.error('Error generating PDF:', error);
    }
  }

  return { generateAndDownloadPDF };
}
