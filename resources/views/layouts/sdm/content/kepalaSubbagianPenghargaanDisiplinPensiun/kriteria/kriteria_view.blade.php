@extends('template.sdm.template')

@section('css_header')
    <!-- Boxicons -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> --}}
    <!-- or -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"> --}}

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/skins/content/tinymce-5/content.min.css" integrity="sha512-AQlh8pNI8GdH0sbUsSACzz37sCq68PohXzXYt/YOJt581nIiqnMjF4YM9lp5YVBMLR90GzkJLQNQjcfLn2yhUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js_header')
    <!-- Boxicons -->
    {{-- <script src="https://unpkg.com/boxicons@2.0.9/dist/boxicons.js"></script> --}}

    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Tinymce -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/tinymce.min.js" integrity="sha512-cJ2vUNryvHzgNJfmFTtZ2VX5EMT5JOU1i8nm+L1kwoHQ9bSqSYdswxyk++9Gi27p3BG2rXZXLMsTsluY4RZSSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/icons/default/icons.min.js" integrity="sha512-ognxPTomLSegPdHq1F54G6h6TN9M31vFN/Qb8rmq3tQMnDg0cPQjFpmFf3kBEaLyETVeGyl7jUWfTLlvLQiW/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/models/dom/model.min.js" integrity="sha512-8EkgxcEEyTZLUfX8JglMFG66KtdJS/wJT3q4t8Tdh7EUPmlDn/0VpYQCO9ikfX41V2ZfyJgJdipdkLzBYgu+WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/advlist/plugin.js" integrity="sha512-GIe7lfp6j3bRoNuAM3ibGcLqgf860dPXG4p47+wkD+ykPadEAhWbeLcU5OELOdvM65pUoUunpbnXcs2S/Bj1HA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/advlist/plugin.min.js" integrity="sha512-49BP653poTafnwXEb9qVGlteOxPvJVWSiCYjuLXGeKh2W/fPwifxZ6fnHiV0/iYmbODzY1vMBJTZJKnRVPidTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/anchor/plugin.js" integrity="sha512-x+EI6MuffWD5GowzrxoNRvwsIyqGTMY9xXf78BDhaJ2iSK9fste4NwfJNh4zhla/T+Ng4UH55o8mZvFJxalC0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/anchor/plugin.min.js" integrity="sha512-jc0JcPMZkTdf+Sl0/MhR/ynyd+ymoFhddvMDKF0FW5K8HAwjUKizFXgC9rJJx0aGHCFB+J8Msr4EhVcgbtkV2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/autolink/plugin.js" integrity="sha512-n+X7eL62dN8bVwOvVRET89uh8EUygU1lyS+iPa1hmV8ovdG0n92Nno2ticvfuMb1AkGOuZLJNSJx2JVYchWQVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/autolink/plugin.min.js" integrity="sha512-ykwKrJaqY/k0S8TuYSzxk2Z9n0xoQyG+kd4cB/ASugbUFNNJEhrifuJ2GEPLTlVX3yUWz4IWXNYhbGZxQ5D7Cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/autoresize/plugin.js" integrity="sha512-sCk3I0N7DDNRYegbN5uAQMrpOYqPZ75Yf9dT9eR2r0XuUhX+hVM86Ei6XjedssY1VkqfjjQNytCAfRbX8jg+Ug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/autoresize/plugin.min.js" integrity="sha512-xpPe9fPtIKWW4ZrzLJNZTStt3R3XgiSWn7ov7++UsLdxNe+3C/Vnu2x4oUkG3e4/i+cU7rsN4b5kvY2UIvqDRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/autosave/plugin.js" integrity="sha512-T57yYVMSAeMyUST4uZullRlqAg7zxvsXTfJ0oRti9j7NNfLELZbEFk81BGVJHIbnl/BMDNkLP5zER2+3UC7s+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/autosave/plugin.min.js" integrity="sha512-rT1ZDch4Feir5dlsxXGl0og8oS28KKiryH/7KToYk7qhtxpcMHXQsS9Sd5sS1nXJyulOVtwN1juiysad30ZeiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/charmap/plugin.js" integrity="sha512-Oe6Z1C2vehO90f9GkEAtHbAITlKXTnQrYw10xCD28Pcn+n4n0FxsRq6cgfaouadnOYJ+lrHYyTq594gMOKpunA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/charmap/plugin.min.js" integrity="sha512-tH4iGDpJ7371V950ZQa5CgcAkXJQ5ba8wT4KBTwtn7DRy4FTJTHUUS+wfdXaSYQLHxa/IpNmDE2Mwm3zVCqTcw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/code/plugin.js" integrity="sha512-JQhfjMLI3Drqx9++zcWtXCBDUnOJF93U8psbQBwP5UJNZXotLegUEHfNtprciMV4F8Xo0O+N5hjPBOK+cH2xug==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/code/plugin.min.js" integrity="sha512-bzDyy3lwaF/gY8tREEI3D1OGxh6OLNI5A3bBSa3JUnBoSOfblM5IXbFyNwRkxMgk1sHPoix2lVB4ZXzEROLV5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/codesample/plugin.js" integrity="sha512-sB0XJoDYYsr1P9IGWrlOs5l4vZE35KrqJr1bSwQP5R60uCNyUWV/ZCEN9PVyMZk0uaobdLoPndLY5sNPg52+tw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/codesample/plugin.min.js" integrity="sha512-sb9sOXWSZ4cHP9otApaZ7qJjMIrWRk7jAWYtRVO67R5YmsE/MowOVTAGS7a1U518N47flmEQa23JI+P7gr7B6w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/directionality/plugin.js" integrity="sha512-kUvcgeydPR0UrUUnal5/KmeV6cLaWt+Bk+J07ix5SNmerXFjJdL2JGt46DUGAWK3thI5Zi9Sq1TFzMip7/TIKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/directionality/plugin.min.js" integrity="sha512-WoEau/3HxJbjvC77ubQxT8vYJv9J150fCV5PIHL6LYhUFYmhKwKG6AVBQdySmrvPc2LR8fGVa6C1WqR2OR0HkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/emoticons/plugin.js" integrity="sha512-6SnT6iPyMyOuRodfEQS5CxqibizHj+CvwVuL3Rf7EK/W6sDLYzTC5BgQBLuu99oeSgtkxv22kwYLDtI2r7d/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/emoticons/plugin.min.js" integrity="sha512-xk0Nwlut1IfEUMmUwJs3RdeE47TUB0QBPJcI/MSU33IdtqQq0vJX282DGNOD1b6bHXAFKThwRWGQJIotPMrNPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/fullscreen/plugin.js" integrity="sha512-QJcatMwDAfdtv1/+kTyS3u289m9p/nYurrFShhW9XZQcCehkzzsoTiGVZ+11eA9vQWpaql5+uoZ2uGdkhsWm3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/fullscreen/plugin.min.js" integrity="sha512-sxB0NclCvGxt/yLDkTDM7m//2h5NZ6EWAbMlkoUSBIgU0GyEKfTUW0XLH7sOz31TpEarRDK2bQe3FTazZDempA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/help/plugin.js" integrity="sha512-/cNswR0WQk50zcexgqjFliR4hcH8jZEZNRlHFAYfxdGNXd4WsklhN7/uvCPbktO/kLV2gBscTKrjrS+/tBCesA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/help/plugin.min.js" integrity="sha512-E8EKpwVjpoBY7iUvZ3UxtTCqk9ntk3tYROOqQxmmD0tizMmLT27j9ACjr2qhWD3d3R5ZWwMgeJo+L+EjmvAejw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/image/plugin.js" integrity="sha512-fi2QP1eFclpUdQ5u+I4L4/30wFDJpnK5TaXfh0+7I6NRs3RgtkPO/Rxi23uNPMiMgD0mek36XDk9jebQNBXoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/image/plugin.min.js" integrity="sha512-gaNg/3KeUyMIBhM0GSZQZYCM8zAz8ou0FRgET5M33WfpvlsTEtHXbnXr9lk45snZ9dXgArWQCQj1bVkVg7TFpw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/importcss/plugin.js" integrity="sha512-Kb+vVFyKOuZbqGQFrgvokJqL9iFrrTdIwbmb/ixLGwFXvKdG469L96+xfANGRffcyuAhLVpXPJM8u3mdDVr+9A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/importcss/plugin.min.js" integrity="sha512-aDuxOQbKJLeEHQXBPbdIwBDmZpZdtqHjfByK+0MZASNnIP2/oRtWpsj4hVtajYpStfQqWCVSBM3yrHJeqbvROQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/insertdatetime/plugin.js" integrity="sha512-L7MAK2xGM/0eEpuok58Y1z1gBH7G5GtLlklAZDa62mP35nzVsRvbRzdcXNTVGqHcSQ3SU+lKpDc7C+mXV8FISA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/insertdatetime/plugin.min.js" integrity="sha512-zqTs1FccC76AfoeRvEF/J34o+xdfLAY1qMJZpIwJBn2afr/TGy7Lyll98ClKAgNxXOGN9hTBk7uUY90MMAiRlg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/link/plugin.js" integrity="sha512-QeQ2eBgdPs3f9jd3XSdWBM2Y3GJqVMfkXRMhPETvd7TkDzhhPgCrG55QDUETeE0psoTxygZfyAOQK4+xN5U00Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/link/plugin.min.js" integrity="sha512-BXC0opwWVUNA5itFhjU+8YpolQcw2TAXqRRAuc3teS02pF4/vBp9sYXmSqE33XZvFSoMEgOrhAxLML3UE2e5FA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/lists/plugin.js" integrity="sha512-ySu2XfskGTsoFZIJnyl9G9NWEozEf8YPQBGjeAAuoOg2iDtTvIzp0GHqJ+1+06119XmHcGJMJn/dixj9oqKRpg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/lists/plugin.min.js" integrity="sha512-gTRv67M5dqXxFyMbdS18dGDTdFENy4P+VtPOsMrFYTfl1zZBPYa0D10bqpv2rwqRKPcf13LmhB14/DcrtQDmKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/media/plugin.js" integrity="sha512-ImSH4Z+uQO2HuUo+5apXeELy/GFtWYrlk+gAkB4HfOeC2oAj5t8LPDZveyxylkCztAloBrxjVMv7e6PG++CGWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/media/plugin.min.js" integrity="sha512-Pfo64QD5dnXcyjnma0UqDmX5epG8aJNq9XqVMk6yBjif6Vh6rj0nT1TRWgdKVemYYaRPBn+Z18JsJ7BBXCVsRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/nonbreaking/plugin.js" integrity="sha512-Ss0CP9jeUMWM/yRhXB3zk7lz5UJivwJSLvwevRvW/bOUfIFAHq7IroX9wdUdIA+bnagHJySwP/tsw9ssx9lzfg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/nonbreaking/plugin.min.js" integrity="sha512-9r+DhG8ycggO6lzu2Skp/KDIwq6cA+j0g8KIqrhrB5rarmTozDoFbWMbTFkhv2mCX4j2JdT9voy16Dz4xEEJxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/pagebreak/plugin.js" integrity="sha512-26IHsXn/sJIFfrw5gmvNOEz5BVKPGNK5jPXc1WZZjGezAqD1NcfYbPqSltfM3e2AFVfPiF8PMqMaw8D836/fqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/pagebreak/plugin.min.js" integrity="sha512-ecoeZ/3fgxq2KpPPBzK5LIgJInRseduOu2O3SdVN/re+F2CfCBJTp8CXpxtzFGH8Bffv1FSW0b1RJNUXKmayRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/preview/plugin.js" integrity="sha512-IT7VunVMO1z2PAciVaGSIw3Y72CUN3fpEazdz4o/vp1SrVhHaC8ObZrwZBMb3vU7/FHf1aRUnFgcajMeMJJR/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/preview/plugin.min.js" integrity="sha512-gsVjYeHFLl/ljc59qHZJvOQ5iXkMU34xmr3mW4fl5S22KXvCRbHEEWj09JFtrWsfx2pDJw+QxsDMs0IW6NZxmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/quickbars/plugin.js" integrity="sha512-+f+LEhXXWr8bjwpRVKLd42hw3Vn9t2taDua/ZClnMOjYBEyB749OdwyBj9rnOTCQYV58IgOv/w8D2gbxxGyCqw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/quickbars/plugin.min.js" integrity="sha512-2Ed0EBov6j1YetwBdL94t7yQ385E9b2DwGRI+i1gfNgTxGwf4zIkF3Kbp1/86lv0q1Cu3mSMmVlbOun9Kn7rjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/save/plugin.js" integrity="sha512-9XDdz4gdWVctI87LRA5DBrsTPrSP+v0CFM9+qOtCECP/jgm2UDGltvGwVEwk5ArW9fwiwYbhilTz+XNGBlKwqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/save/plugin.min.js" integrity="sha512-QePEM5SKS9J8hfVz7a298I3E9YUFQwtGv93x4fe3Ik2waZ+LHBY5jjMuPXLE88Ktca05EIskDSooBDiOBIxMsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/searchreplace/plugin.js" integrity="sha512-YjurugTKWHKDCx5C4gytithPNJhlF6wNaf22peSMK/e1UvSlWdbC36ViTL/VTivK9pxuKPmyO3IVBnEumah7wQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/searchreplace/plugin.min.js" integrity="sha512-4mxTSY6aHZWPIHsFoqL1du7m1IVu0OcrLK7HkYGHJYkHSvcBw0vkVsp+5SlFwNtcLxWfJQivt2lxBz1uM60ypQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/table/plugin.js" integrity="sha512-pYJk+cOHkDPiiQlm5mtUY6AkUN7vH8H5MVjLiWHBZEBF6xAZ2clOUUc2JQ/AH94zd2nFgPyHV0YSHu+QMGZctA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/table/plugin.min.js" integrity="sha512-EbJha3SPe/iGGvypG7UOVpsi1+3TgWysJuVLoGCzJajeVXInt2aAwe8FUtt4VH0IEZSoWEZ1JvPSu/ycBx7ZBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/template/plugin.js" integrity="sha512-9EhoSJGVtHiqVEmzjoAbavpeXWykgG2QUg5aoVGbL0okhQzVQCg1i89ZTWc92sXhANAiVNYVKfDVEAPm5OX2IQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/template/plugin.min.js" integrity="sha512-u1LKG1/L2ygwqKjMQ2C0fH0IPbnJGH0x1e0h9u/NioM7W3y4owV9Ig35P3MKul+7w7Uu2SGpbLhsy1xsD/ALkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/visualblocks/plugin.js" integrity="sha512-+jWkkKTf0dwIX606jx3x0QjAyU2zTD3Ky4QToGDQAyMS1LrnzxASlsoxgI++v2ZwLIrD0a18HxniacD5KBFv5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/visualblocks/plugin.min.js" integrity="sha512-t8S6PTNSef01NesJ6js9TlXfznBVr/VMIkSr5eF49ccuCl0XFkJx5wpkCwVGkMyJdF3bTwyXxXwEWaxn8bf/Lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/visualchars/plugin.js" integrity="sha512-IbPGJr8P8jDsaUTgIpijVRJdMBR9IFBT/EVwqU35ww9zCFNwPwJzDt7SuJQ7BEy/cNmwpsjm5x51YaBvRUL7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/visualchars/plugin.min.js" integrity="sha512-eI4ndl00FmHYbVYF/MGh8BOZI0CSlcBgETEEU4vlWgvhrYra5+R45ZDoJ5HnLvFxnVmdNsx6km21xnD6aZzLdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/wordcount/plugin.js" integrity="sha512-VhpWs4PYQRCbK0liCxkU0C0pMQC8MuC0gb/fawL6m2a0h0k7qpNfuSjdqJu5QMWn6a2uI93CQuoDvQozzCOp3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/wordcount/plugin.min.js" integrity="sha512-/t0T7XtYNFjq/nz5CNjtPW62hKehpt5AovXQeKyowCNaAO2C1ElpRbfr1dW6ykhbGZwQoOWKQXUN1WXorZgrnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/themes/silver/theme.min.js" integrity="sha512-3Ud03P3xUf2jc5jQ6yfXX+0onUS+lDu0L1iMvlP0zE6iwDAGnFkMYj8eqqtMJMyxGtlm0dvd8K7QKrTQd2FXVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/emoticons/js/emojiimages.min.js" integrity="sha512-cqo4otyf79ihBk6bytEIA3wH+CrtLtJMWwwFRMoxN9BLcBfqxQP9mQVSxJz4ojPOZryQ0xDwUvEEWJygKo8c7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.2/plugins/emoticons/js/emojis.min.js" integrity="sha512-5NJEoT6d7p+dhnqoCaA/ydy0t8k2kBssXSErCkzG4HiuRPWPfiVg+bGP0XPdpxWRv9ooHCrYYLbiBRKoFRbvCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script>
        tinymce.init({
            selector: '#criteriasEditor',
            height: 300,
            width: '90%',
            resize: false,
            readonly: true,
        });
    </script> --}}
@stop

@section('js_footer')
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Select Categories -->
    <script>
    $(document).ready(function() {
        $('#select-categories').select2({
            theme: 'bootstrap-5',
            placeholder: $( this ).data( 'placeholder' ),
        });
    });
    </script>
@stop

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mt-3">

        <div class="col-xxl">

            <!-- Card View Criteria -->
            <div class="card mx-4">

                <!-- Form View Criteria Title -->
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Lihat Kriteria</h5>
                </div>
                <!--/ Form View Criteria Title -->

                <!-- Form View Criteria -->
                <div class="card-body py-xl-5 py-sm-5 px-xl-5">

                    <form id="formViewCriterias" class="mx-2" method="POST" action="#">
                        @csrf
                        <!-- Categories -->
                        <div class="mb-3 row {{ $errors->has('categories') ? 'is-invalid' : '' }}">
                            <label for="categories" class="text-wrap col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge {{ $errors->has('categories') ? 'is-invalid' : '' }}">
                                    <span id="categories" class="input-group-text">
                                        {{-- <box-icon name='list-ul'></box-icon> --}}
                                        <i class="fa-solid fa-list-ul" style="color: #000000;"></i>
                                    </span>
                                    <select class="form-select px-lg-1 px-2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" id="select-categories"
                                        name="categories" data-placeholder="--Pilih Kategori--"
                                        autofocus autocomplete required
                                        data-width="80%" aria-label="--Pilih Kategori--"
                                        aria-invalid="true" aria-describedby="categories"
                                        readonly disabled >
                                        <option value="{{ $criteria->categories->id }}" disabled selected>{{ $criteria->categories->category }}</option>
                                    </select>
                                    <div class="d-flex flex-column">
                                        <div id="categoriesHelp" class="form-text">We'll never share categorie with anyone else.</div>
                                        <!-- Error categories -->
                                        @if ( $errors->has('categories') )
                                            <span class="help-block">
                                                <strong>{{ $errors->first('categories') }}</strong>
                                            </span>
                                        @endif
                                        <!--/ Error categories -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Categories -->

                        <!-- Criterias -->
                        <div class="mb-3 row {{ $errors->has('criterias') ? 'is-invalid' : '' }}">
                            <label for="criterias" class="text-wrap col-sm-3 col-form-label">Kriteria</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge {{ $errors->has('criterias') ? 'is-invalid' : '' }}">
                                    <span id="criterias" class="input-group-text">
                                        {{-- <box-icon name='slider-alt'></box-icon> --}}
                                        <i class="fa-solid fa-sliders" style="color: #000000;"></i>
                                    </span>
                                    <input type="text" class="form-control px-lg-1 px-2 {{ $errors->has('criterias') ? 'is-invalid' : '' }}" id="criterias"
                                        name="criterias" placeholder="*Kriteria"
                                        autofocus autocomplete required
                                        value="{{ old('criterias',$criteria->criteria) }}"
                                        aria-invalid="true" aria-describedby="criterias"
                                        data-val="true" readonly disabled />
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="criteriasHelp" class="form-text">We'll never share criteria with anyone else.</div>
                                    <!-- Error criterias -->
                                    @if ( $errors->has('criterias') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('criterias') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error criterias -->
                                </div>
                            </div>
                        </div>
                        <!--/ Criterias -->

                        <!-- Value Quality -->
                        <div class="mb-3 row {{ $errors->has('value_quality') ? 'is-invalid' : '' }}">
                            <label for="value_quality" class="text-wrap col-sm-3 col-form-label">Bobot Nilai</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge {{ $errors->has('value_quality') ? 'is-invalid' : '' }}">
                                    <span id="value_quality" class="input-group-text">
                                        <i class="fa-solid fa-arrow-down-1-9" style="color: #000000;"></i>
                                        <i class="fa-solid fa-arrow-up-9-1" style="color: #000000;"></i>
                                    </span>
                                    <input type="number" class="form-control px-lg-1 px-2 {{ $errors->has('value_quality') ? 'is-invalid' : '' }}" id="value_quality"
                                        name="value_quality" placeholder="*Bobot Nilai"
                                        autofocus autocomplete required
                                        value="{{ old('value_quality', $criteria->value_quality) }}"
                                        aria-invalid="true" aria-describedby="value_quality"
                                        data-val="true" min="0" max="100" readonly disabled>
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="value_qualityHelp" class="form-text">We'll never share value quality with anyone else.</div>
                                    <!-- Error Value Quality -->
                                    @if ( $errors->has('value_quality') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('value_quality') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Value Quality -->
                                </div>
                            </div>
                        </div>
                        <!--/ Value Quality -->

                        <!-- Normalization -->
                        <div class="mb-3 row {{ $errors->has('normalization') ? 'is-invalid' : '' }}">
                            <label for="normalization" class="text-wrap col-sm-3 col-form-label">Normalisasi</label>
                            <div class="col-sm-9">
                                <div class="input-group input-group-merge {{ $errors->has('normalization') ? 'is-invalid' : '' }}">
                                    <span id="normalization" class="input-group-text">
                                        <i class="fa-solid fa-arrow-down-1-9" style="color: #000000;"></i>
                                        <i class="fa-solid fa-arrow-up-9-1" style="color: #000000;"></i>
                                    </span>
                                    <input type="number" class="form-control px-lg-1 px-2 {{ $errors->has('normalization') ? 'is-invalid' : '' }}" id="normalization"
                                        name="normalization" placeholder="*Bobot Nilai"
                                        autofocus autocomplete required
                                        value="{{ old('normalization', $normalization) }}"
                                        aria-invalid="true" aria-describedby="normalization"
                                        data-val="true" min="0" max="100" readonly disabled>
                                </div>

                                <div class="d-flex flex-column">
                                    <div id="normalizationHelp" class="form-text">We'll never share normalization with anyone else.</div>
                                    <!-- Error Normalization -->
                                    @if ( $errors->has('normalization') )
                                        <span class="help-block">
                                            <strong>{{ $errors->first('normalization') }}</strong>
                                        </span>
                                    @endif
                                    <!--/ Error Normalization -->
                                </div>
                            </div>
                        </div>
                        <!--/ Normalization -->

                        <!-- Action Button -->
                        <div class="d-flex justify-content-end">
                            <div class="justify-content-between">
                                <a class="btn btn-secondary btn-lg" href="{{ URL::to('sdm/kepala-subbagian-penghargaan-disiplin-dan-pensiun/manage/criterias') }}" role="button" style="color: black">
                                    <i class="fa-solid fa-arrow-left mx-auto me-1"></i> Kembali
                                </a>
                            </div>
                        </div>
                        <!-- Action Button -->

                    </form>

                </div>
                <!--/ Form View Criteria -->

            </div>
            <!--/ Card View Criteria -->
        </div>
    </div>
</div>

@stop
